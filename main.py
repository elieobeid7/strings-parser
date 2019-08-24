from StringChecker import StringChecker

filePrefix = 'Action' 
fileEXt = ".php"
folder = '/home/elie/Desktop/RayLation/main'

# Create a new ComplexNumber object
files = StringChecker(filePrefix, fileEXt, folder)

print(files)