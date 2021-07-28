from django.shortcuts import render, redirect
from django.contrib import messages
from django.http import HttpResponseNotFound
from faunadb import query as q
import pytz
from faunadb.objects import Ref
from faunadb.client import FaunaClient
import hashlib
import datetime


# FAUNA_SECRET_KEY
client = FaunaClient(secret="fnAEPCpiiwACC2pgsTAA-xBiJ7idiPXu_M5YAaqt")
indexes = client.query(q.paginate(q.indexes()))

# Create your views here.


def index(request):
    return render(request, "index.html")


def login(request):
    if request.method == "POST":
        username = request.POST.get("username").strip().lower()
        password = request.POST.get("password")

        try:
            user = client.query(
                q.get(q.match(q.index("User_index"), username)))
            if hashlib.sha512(password.encode()).hexdigest() == user["data"]["password"]:
                request.session["user"] = {
                    "id": user["ref"].id(),
                    "username": user["data"]["username"]
                }
                return redirect("App:index")
            else:
                raise Exception()
        except:
            messages.add_message(
                request, messages.INFO, "You have supplied invalid login credentials, please try again!", "danger")
            return redirect("App:login")
    return render(request, "login.html")


def register(request):
    if request.method == "POST":
        username = request.POST.get("username").strip().lower()
        email = request.POST.get("email").strip().lower()
        password = request.POST.get("password")

        try:
            user = client.query(
                q.get(q.match(q.index("users_index"), username)))
            messages.add_message(request, messages.INFO,
                                 'User already exists with that username.')
            return redirect("App:register")
        except:
            user = client.query(q.create(q.collection("User"), {
                "data": {
                    "username": username,
                    "email": email,
                    "password": hashlib.sha512(password.encode()).hexdigest(),
                    "date": datetime.datetime.now(pytz.UTC)
                }
            }))
            messages.add_message(request, messages.INFO,
                                 'Registration successful.')
            return redirect("App:login")
    return render(request, "register.html")


def create_resume(request):
    if request.method == "POST":
        username = request.session["user"]["username"]
        full_name = request.POST.get("full_name")
        address = request.POST.get("address")
        phone = request.POST.get("phone")
        email = request.POST.get("email")
        birthdate = request.POST.get("birthdate")
        professional_title = request.POST.get("professional_title")
        about_you = request.POST.get("about_you")
        career_objective = request.POST.get("career_objective")
        education = request.POST.get("education")
        skills = request.POST.get("skills")
        projects = request.POST.get("projects")
        experience = request.POST.get("experience")
        reference = request.POST.get("reference")
        try:
            resume = client.query(
                q.get(q.match(q.index("resume_index"), username)))
            quiz = client.query(q.update(q.ref(q.collection("Resume_info"), resume["ref"].id()), {
                "data": {
                    "user": username,
                    "full_name": full_name,
                    "address": address,
                    "phone": phone,
                    "email": email,
                    "birthdate": birthdate,
                    "professional_title": professional_title,
                    "about_you": about_you,
                    "career_objective": career_objective,
                    "education": education,
                    "skills": skills,
                    "projects": projects,
                    "experience": experience,
                    "reference": reference,
                }
            }))
            messages.add_message(
                request, messages.INFO, 'Resume Info Edited Successfully. Download Resume Now')
            return redirect("App:create-resume")
        except:
            quiz = client.query(q.create(q.collection("Resume_info"), {
                "data": {
                    "user": username,
                    "full_name": full_name,
                    "address": address,
                    "phone": phone,
                    "email": email,
                    "birthdate": birthdate,
                    "professional_title": professional_title,
                    "about_you": about_you,
                    "career_objective": career_objective,
                    "education": education,
                    "skills": skills,
                    "projects": projects,
                    "experience": experience,
                    "reference": reference,
                }
            }))
            messages.add_message(
                request, messages.INFO, 'Resume Info Saved Successfully. Download Resume Now')
            return redirect("App:resume")
    else:
        try:
            Resume_info = client.query(q.get(
                q.match(q.index("resume_index"), request.session["user"]["username"])))["data"]
            context = {"Resume_info": Resume_info}
            return render(request, "create-resume.html", context)
        except:
            return render(request, "create-resume.html")


def resume(request):
    try:
        Resume_info = client.query(q.get(
            q.match(q.index("resume_index"), request.session["user"]["username"])))["data"]
        context = {"Resume_info": Resume_info}
        return render(request, "resume.html", context)
    except:
        return render(request, "resume.html")
