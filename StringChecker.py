import os
from pathlib import Path
from enumPHP import Seperator
from analyzePHP import analyzePHP

response = ['statusFail', 'statusOk', 'dialog']


class StringChecker:
    def __init__(self, filePrefix, fileExt, folder):
        self.filePrefix = filePrefix
        self.fileExt = fileExt
        self.folder = folder


    # get files having a predefined prefix
    def getFiles(self):
        targetedFile = self.filePrefix + self.fileExt
        files = []
        for fileName in os.listdir(self.folder):
            if targetedFile in fileName:
                key = os.path.dirname(os.path.abspath(fileName)) + fileName
                files.append(key)
        return files


    # Get filename without path, prefix or extension
    def getFileNameBase(self, fileName): 
        fileName = Path(fileName).stem # remove path and extension
        fileName = fileName.replace(self.filePrefix, '') # remove prefix
        return fileName



    def locateExpressionSemiCol(self,fileName):
        lineCounter =1
        expression = ''
        previousExp = ''
        with open(fileName) as text:
            data = text.read()
            for char in data:
                expression.join(char)
                if char == Seperator.NEW_LINE.value:
                    lineCounter+=1
                    singleQuotesCount = expression.count(Seperator.SINGLE_QUOTE.value)
                    doubleQuotesCount = expression.count(Seperator.DOUBLE_QUOTE.value)

                    if Seperator.RESPONSE.value in expression:
                        result = State.RESPONSE.value
                    


                    # dismiss everything that's not potentially a string or part of a paragraph
                    if previousExp != '' and ( singleQuotesCount == 0 or  doubleQuotesCount == 0):
                        expression = ''
                    else:
                        result = analyzePHP(expression, singleQuotesCount, doubleQuotesCount)
