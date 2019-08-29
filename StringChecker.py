from pathlib import Path
from enumPHP import Seperator, State
from analyzePHP import  filterText, getPHPStrings, remove_comments
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

    def getExpression(self, fileName):
        templateName = self.getFileNameBase(fileName)
        expression = ''
        blacklist = ['$private', '$verbs', '$inputRules']
        with open(fileName) as text:
            constantArr = []
            data = remove_comments(text.read())
            for char in data:
                expression = ''.join([expression, char])
                if char is Seperator.END.value:
                    result = filterText(expression)
                    expression = ''
                    if result is not None:
                        string = getPHPStrings(result, blacklist)
                        if string == State.CONST_DOUBLE_QUOTE.value or State.CONST_SINGLE_QUOTE.value:
                            arr = result.split("=")
                            constant = arr[0][5:].strip()
                            sentence = arr[1].strip()
                            constantArr.append(constant)
                            sentence = sentence.replace(" ", '_')                            
                            new_string = ''.join([arr[0].strip(), templateName, '__', sentence])
                        
                        elif string == State.STRING_SINGLE_QUOTE.value or State.STRING_DOUBLE_QUOTE.value:
                            arr = result.split("=")
                            variable = arr[0].replace("$","").strip()
                            sentence = arr[1].strip()

                            sentence = sentence.replace(";", ");")

                            new_string = ''.join(
                                [arr[0].strip(), 'trans(', templateName, '__', sentence])
                        
                            
                        

    # Get filename without path, prefix or extension
    def getFileNameBase(self, fileName): 
        fileName = Path(fileName).stem # remove path and extension
        fileName = fileName.replace(self.filePrefix, '') # remove prefix
        return fileName
