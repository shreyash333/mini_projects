import os

for i in range(0, 70):
    name = "Roll_no_"+str(i+100) + ".pdf"
    newname = "Roll_no_"+str(i+1)+".pdf"
    os.rename(name, newname)
    print(newname)
