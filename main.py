from StringChecker import StringChecker
from enumPHP import Seperator
filePrefix = 'Action' 
fileEXt = ".php"
folder = '/home/elie/Desktop/g'
# Create a new ComplexNumber object
files = StringChecker(filePrefix, fileEXt, folder)

paths  = files.getFiles()


for path in paths:
    files.getStrings(path,False)

