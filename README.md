# singlePagePHPRequestLog

This is a single page php end point that allows request header logging in a SQL database on the backend

It requires a user that is allowed to create tables, INSERT into tables and truncate them. 

If you send the request "body=deleteRequestLog" It will truncate the log for you allowing it to be cleared pretty easily. 

If you use this in conjunction with postman it will show you all the requests and how they are formed. 

Usecase: 

You have a webhook that is suppose to hit an API endpoint but you dont know what the exact request will look like - this will give you clear logging about the request/response. 
 
