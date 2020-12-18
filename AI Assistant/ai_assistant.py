import pyttsx3 
import speech_recognition as sr 
import datetime
import wikipedia 
import webbrowser
import os
import smtplib
import pyautogui

engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
chrome_path = 'C:/Program Files (x86)/Google/Chrome/Application/chrome.exe %s'

engine.setProperty('voice', voices[1].id)
songnum = 0
screenshotnum = 0

def speak(audio):
    engine.say(audio)
    engine.runAndWait()


def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour>=0 and hour<12:
        speak("Good Morning!")

    elif hour>=12 and hour<18:
        speak("Good Afternoon!")   

    else:
        speak("Good Evening!")  

    speak("I am your assistant, how can I help you")       

def takeCommand():

    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        r.pause_threshold = 1
        audio = r.listen(source)

    try:
        print("Recognizing...")    
        query = r.recognize_google(audio, language='en-in')
        print(f"User said: {query}\n")

    except Exception as e:
        # print(e)    
        print("Sir please repeat")  
        
        return "None"
    return query

def sendEmail(to, content):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    server.login('sshreyash34@gmail.com', '###########')
    server.sendmail('sshreyash34@gmail.com', to, content)
    server.close()

def takenote(content):
    
    file = open("C:\\Users\\Asus\\Desktop\\note.txt", "a") 
    dateandtime = datetime.datetime.now().strftime("Date - %d-%m-%y \tTime - %H-%M")
    file.write(dateandtime) 
    file.write("\n")
    file.write(content)
    file.write("\n\n")
    file.close() 

def takescreenshot():
    screenshot = pyautogui.screenshot()
    name = 'screen'+ str(screenshotnum) + '.png'
    screenshot.save(name)
    

if __name__ == "__main__":
    wishMe()
    while True:
        query = takeCommand().lower()
        if 'wikipedia' in query:
            speak('Searching Wikipedia...')
            query = query.replace("wikipedia", "")
            results = wikipedia.summary(query, sentences=2)
            speak("According to Wikipedia")
            print(results)
            speak(results)

        elif 'open youtube' in query:
            webbrowser.get(chrome_path).open("youtube.com")

        elif 'open google' in query:
            webbrowser.get(chrome_path).open("google.com")

        elif 'open stackoverflow' in query:
            webbrowser.get(chrome_path).open("stackoverflow.com")   

        elif 'open linkedin' in query:
            webbrowser.get(chrome_path).open("linkedin.com") 

        elif 'open browser' in query:
            webbrowser.get(chrome_path).open("duckduckgo.com")

        elif 'take note' in query:
            try:
                speak("What you what to note?")
                content = takeCommand()
                takenote(content)
                speak("Noted")
            except Exception as e:
                print(e)
                speak("Sorry Sir! I am not able to complete the task")   

        elif 'play music' in query:
            music_dir = 'D:\\SONGS\\mid songs'
            songs = os.listdir(music_dir)   
            os.startfile(os.path.join(music_dir, songs[songnum]))

        elif 'change song' in query:
            songnum = songnum +1
            music_dir = 'D:\\SONGS\\mid songs'
            songs = os.listdir(music_dir)   
            os.startfile(os.path.join(music_dir, songs[songnum]))

        elif 'the time' in query:
            strTime = datetime.datetime.now().strftime("%H:%M:%S")    
            speak(f"Sir, the time is {strTime}")

        elif 'open code' in query:
            codePath = "C:\\Users\\Asus\\Desktop\\Visual Studio Code"
            os.startfile(codePath)

        elif 'open telegram' in query:
            codePath = "C:\\Users\\Asus\\AppData\\Roaming\\Microsoft\\Windows\\Start Menu\\Programs\\Telegram Desktop\\Telegram"
            os.startfile(codePath)

        elif 'take screenshot' in query:
            try:
                takescreenshot()
                screenshotnum = screenshotnum +1
                speak("Screenshot Saved")
            except Exception as e:
                print(e)
                speak("Sorry Sir! I am not able to complete the task")   
            


        elif 'quit'  in query:
            exit()

        elif 'send mail' in query:
            try:
                speak("To whom?")
                to = takeCommand()
                if to == 'myself':
                    sendto = "sshreyash34@gmail.com"
                else:
                    sendto = to
                speak("What should I say?")
                content = takeCommand()
                sendEmail(sendto, content)
                speak("Email has been sent!")
            except Exception as e:
                print(e)
                speak("Sorry Sir! I am not able to complete the task")    
