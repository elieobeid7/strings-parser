from StringChecker import StringChecker

filePrefix = 'Action' 
fileEXt = ".php"
folder = '/home/elie/Desktop/RayLation/main'

# Create a new ComplexNumber object
files = StringChecker(filePrefix, fileEXt, folder)

expressions = files.locateExpressionSemiCol('testAction.php')

# for item in expressions:
#     print (item[2])

print(expressions)