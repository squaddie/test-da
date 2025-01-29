- run git clone;
- open terminal and `cd` to cloned project;
- make sure ports `80` and `3306` are available, or simply execute `docker stop $(docker ps -qa)`;
- execute `docker compose up`, this command will build a project with its dependencies;
- open postman or any other tool and send post request 


```
curl --location '127.0.0.1/api/register' \
--header 'Content-Type: application/json' \
--data-raw '{
    "first_name": "first_name",
    "last_name": "last_name",
    "email": "email@example.com",
    "role": "role"
}'
```
allowed roles are `student`, `teacher`, `parent`, `tutor`
