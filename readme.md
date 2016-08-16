## NJIT API's

### Create New User
```bash
curl -i -X POST "http://localhost:8000/api/v0.1/users" -H "Content-Type: application/json" -d '{"name": "Jay Ravaliya", "email": "jayrav13@gmail.com", "password": "github2016"}'
```

### Get Existing User
```bash
curl -i -X GET "http://localhost:8000/api/v0.1/users" -H "Content-Type: application/json" -d '{"api_token": "..."}'
```

### Edit Existing User
```bash
curl -i -X PATCH "http://localhost:8000/api/v0.1/users" -H "Content-Type: application/json" -d '{"name": "Ray Javaliya", "api_token": "..."}'
```

### Delete Existing User
```bash
curl -i -X DELETE "http://localhost:8000/api/v0.1/users" -H "Content-Type: application/json" -d '{"api_token": "..."}'
```

### Get Buildings
```bash
curl -i -X GET "http://localhost:8000/api/v0.1/buildings" -H "Content-Type: application/json" -d '{"api_token": "..."}'
```

### Get Events
```bash
curl -i -X GET "http://localhost:8000/api/v0.1/events" -H "Content-Type: application/json" -d '{"api_token": "..."}'
```

