from StringChecker import StringChecker

filePrefix = 'Action' 
fileEXt = ".php"
folder = '/home/elie/Desktop/strings parser/local_tests'

# Create a new ComplexNumber object
files = StringChecker(filePrefix, fileEXt, folder)

fileNames  = files.getFiles()

for file in fileNames:
    files.locateExpressionSemiCol(file)
