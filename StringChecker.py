import os
from pathlib import Path
from enumPHP import Seperator
from analyzePHP import analyzePHP
from writer import writeStringsToTranslationFilePHP


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
        mComment = False
        with open(fileName) as text:
            data = text.read()
            for char in data:
                expression.join(char)
                expression = expression.replace(" ", "")
                if char == Seperator.NEW_LINE.value:
                    lineCounter+=1

                if expression.startswith(Seperator.MULTILINES_COMMENT_START):
                    mComment = True
                elif expression.startswith(Seperator.MULTILINES_COMMENT_END) and mComment == True:
                    mComment = False

                    if mComment == False: # if multiline comment  is false 
                    
                        if not expression.startswith(Seperator.PHPSTART) and not expression.startswith(Seperator.PHPEND) and not expression.startswith(Seperator.COMMENT) and mComment == false:
                            singleQuotesCount = expression.count(Seperator.SINGLE_QUOTE.value)
                            doubleQuotesCount = expression.count(Seperator.DOUBLE_QUOTE.value)


                            if expression.endswith(Seperator.End):
                                # end of expression
                                expression = previousExp.join(expression)
                                result = analyzePHP(expression, singleQuotesCount, doubleQuotesCount)
                                writeStringsToTranslationFilePHP(expression, lineCounter, result)
                                previousExp = ''
                            
                            # paragraph
                            else:
                                previousExp = previousExp.join(expression)

            expression = ''
