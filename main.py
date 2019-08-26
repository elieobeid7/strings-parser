from StringChecker import StringChecker
from enumPHP import Seperator
filePrefix = 'Action' 
fileEXt = ".php"
folder = '/home/elie/Desktop/strings parser/tests'

# Create a new ComplexNumber object
files = StringChecker(filePrefix, fileEXt, folder)

fileNames  = files.getFiles()


for fileName in fileNames:
    ressult = files.getExpression(fileName)
