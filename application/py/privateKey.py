#!/usr/bin/env python3
# import os
import hashlib

strKey = "GkVJi5wUTFVePkZq"
strNewVar = hashlib.sha256(str(strKey).encode('utf-8'))
strPartVar =  strNewVar.hexdigest()
print(strPartVar)
