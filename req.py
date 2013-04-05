import hmac
import hashlib
import base64



msg2="GET\nwebservices.amazon.com\n/onca/xml\nAWSAccessKeyId=AKIAIOSFODNN7EXAMPLE&ItemId=0679722769&Operation=I\ntemLookup&ResponseGroup=ItemAttributes%2COffers%2CImages%2CReview\ns&Service=AWSECommerceService&Timestamp=2009-01-01T12%3A00%3A00Z&\nVersion=2009-01-06"

b = msg2.encode('utf-8')
#print b
dig = hmac.new(b'1234567890',msg=b, digestmod=hashlib.sha256).digest()
print base64.b64encode(dig).decode()