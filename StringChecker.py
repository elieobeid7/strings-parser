from pathlib import Path
from enumPHP import Seperator
from analyzePHP import analyzePHP
from writer import writeStringsToTranslationFilePHP
import glob


class StringChecker:
    def __init__(self, filePrefix, fileExt, folder):
        self.filePrefix = filePrefix
        self.fileExt = fileExt
        self.folder = folder

    # get files having a predefined prefix
    def getFiles(self):
        folder = ''.join([self.folder, '/**/*', self.filePrefix, self.fileExt])
        files = glob.glob(folder, recursive=True)
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
                expression = ''.join([expression, char])
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
                                expression = ''.join([previousExp, expression])
                                result = analyzePHP(expression, singleQuotesCount, doubleQuotesCount)
                                writeStringsToTranslationFilePHP(expression, lineCounter, result)
                                previousExp = ''
                            
                            # paragraph
                            else:
                                previousExp = ''.join([previousExp, expression])


            expression = ''
