import fileinput
from pathlib import Path
import os
from time import sleep


def replace_string(filePath, expression, result):
	for line in fileinput.input(filePath, inplace=1):
		print(line.replace(expression, result).rstrip(),)


def translateLaravel(filename, expression):
	if expression and expression is not None:
		key = "".join([expression[0], filename, "__", expression[1:]])
		key = key.replace(" ", "_")
		key = key.strip('')
		translation_file_path = 'files/Translation.php'

		if os.path.isfile(translation_file_path) == False: # the file doesn't exist
			string = "".join(['<?php', '\n', 'return [', '\n', key, ' => ', expression, ',' , '\n'])
			with open(translation_file_path, 'w') as the_file:
				the_file.write(string)
		else:
			with open(translation_file_path, 'a') as the_file:
				the_file.write(''.join([key, ' => ', expression,',', '\n']))
				        
		return key


def writeVariables(filename, expression):
	if expression and expression is not None:
		key = "".join([expression[0], filename, "__", expression[1:]])
		key = key.replace(" ", "_")
		key = key.strip('')
		translation_file_path = 'files/variables.php'

		if os.path.isfile(translation_file_path) == False:  # the file doesn't exist
			string = "".join(['<?php', '\n', 'return [', '\n',
                            key, ' => ', expression, ',', '\n'])
			with open(translation_file_path, 'w') as the_file:
				the_file.write(string)
		else:
			with open(translation_file_path, 'a') as the_file:
				the_file.write(''.join([key, ' => ', expression, ',', '\n']))
		return key
