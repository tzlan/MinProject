"""
MIT License

Copyright (c) 2019 Avi Mimoun

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
"""
import os 
import random
import sys

def readFile(file):
  print("""https://www.github.com/av1m\n
  MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
  MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
  MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
  MMMMMMMMMMMMMMMMMMmhhhhhhNMMMMMMNhhhhhhMMMMMMMMmhhhhhmMMMMMMMMhooosNMMMMMNhhhhhhhdMMMMMNhhhhhhhdMMMM
  MMMMMMMMMMMMMMMMMs`      yMMMMMMh     `MMMMMMMy     /NMMMMMMh:    /MMMMMM/       :MMMMm.       yMMMM
  MMMMMMMMMMMMMMMm:        sMMMMMMd     .MMMMMN/     yMMMNds/`     .NMMMMMh        +MMMh`       /MMMMM
  MMMMMMMMMMMMMMy`   -.    oMMMMMMm     -MMMMm-    :NMMN-          hMMMMMN`   ..   yMMs   -`   .NMMMMM
  MMMMMMMMMMMMN/    oM.    +MMMMMMN     :MMMy`    yMMMM+ ./sd.    +MMMMMM:    h`   dM+   o/    hMMMMMM
  MMMMMMMMMMMh`    hMM`    /MMMMMMM`    :MM+     mMMMMMdNMMM+    .NMMMMMs    +m    m-  `yy    +MMMMMMM
  MMMMMMMMMN/     syyy     :MMMMMMM.    /m-    sMMMMMMMMMMMh     dMMMMMm`   .Mh       .dm`   .NMMMMMMM
  MMMMMMMMh.               -MMMMMMM-          dMMMMMMMMMMMN`    oMMMMMM-    dMo      -mM:    dMMMMMMMM
  MMMMMMN+    -::::::-     .MMMMMMM:        +MMMMMMMMMMMMM/     MMMMMMs    oMM/     /NMs    oMMMMMMMMM
  MMMMMd.     mMMMMMMd     `MMMMMMM/      .dMMMMMMMMMMMMMy     mMMMMMd    -MMM-    oMMm`   -MMMMMMMMMM
  MMMMMhhhhhhNMMMMMMMNhhhhhhMMMMMMMdhhhhhhNMMMMMMMMMMMMMMdhhhhdMMMMMMdhhhhNMMMhhhhdMMMmhhhhmMMMMMMMMMM
  MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
  MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM\n""")
  ang_fr = int(input("Anglais(0) OU Francais(1) ? : ")) 
  phrases = {}
  with open(file) as fp:  
    for (i, line) in enumerate(fp.readlines()):
      phrases[i] = line.split('=')
  for key, mots in sorted(phrases.items(), key=lambda x: random.random()):
      if ang_fr == 1: 
        input(mots[1][1:-1].capitalize() + " : ")
        print()
        print("---   " + mots[0].capitalize())
      else:
        input(mots[0].capitalize() + " : ")
        print("---   " + mots[1][1:-1].capitalize())
  print("@avimimoun")

def OpenFile():
  file = askopenfilename(initialdir="C:/Users/Batman/Documents/Programming/tkinter/",
                          filetypes =(("Text File", "*.txt"),("All Files","*.*")),
                          title = "Choose a file."
                          )
  if file == "" : sys.exit(0)
  root.destroy()
  readFile(file)

try:
  if sys.argv[1] == "-f":
    print(readFile(sys.argv[2]))
  if sys.argv[1] == "-h" or sys.argv[1] == "--help":
    print("-f  :   Entry path to file\n-h or --help for help")
except IndexError:
  try:
    from tkinter import *
    from tkinter.filedialog import askopenfilename
    root = Tk()
    root.geometry("235x35+100+0")
    root.resizable(False, False)
    root.iconbitmap('ico.ico')
    Title = root.title( "File Opener")
    button = Button(text="Select file!", font=("Ubuntu 10 bold"), fg="black", command = OpenFile)
    button.pack()
    root.mainloop()
  except:
    file = input("Enter full path to the file : ")
    readFile(file)