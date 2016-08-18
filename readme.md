# NJIT API

Welcome to NJIT's API! This is an open source project created by Jay Ravaliya (@jayrav13). Members of the community are encouraged to contribute!

## About

The purpose of building this project out is simple - there is a lot of data available on campus, but is disparate and not uniformally accessible. Bringing this data together and making it available to students, courses and organizations will have a multiplying effect on what we're able to build for our community.

## Usage

There are two ways that this API can be used:

 1. Using a version hosted by us, found at https://njit-api.herokuapp.com 
 2. Cloning and hosting it on your own.

Both methods will be discussed throughout this documentation.

## Register

Users can register to use this API by making the following HTTP request:

```bash
curl -i -X GET "https://njit-api.herokuapp.com/api/v0.1/users"
	-H "Content-Type: application/json"
	-d '{
		"name": "Jay Ravaliya",
		"email": "jhr3@njit.edu",
		"password": "password"
	}'
```
> The response will be a User object:

```json
{
  "status": 200,
  "response": {
    "status": 200,
    "description": "OK",
    "type": "Successful",
    "is_successful": true
  },
  "message": null,
  "data": {
    "user": {
      "email": "jhr3@njit.edu",
      "name": "Jay Ravaliya",
      "updated_at": "2016-08-16 05:52:54",
      "created_at": "2016-08-16 05:52:54",
      "id": 6
    },
    "api_token": "..."
  },
  "response_time": 0.1802179813385
}
```

You'll notice that this includes a key `api_token` inside the `data` object. This will be the API Token that is used to make all requests to consume this API's data.

> If the email address was already taken:

```json
{
  "status": 400,
  "response": {
    "status": 400,
    "description": "Bad Request",
    "type": "Client Error",
    "is_successful": false
  },
  "message": null,
  "data": {
    "email": [
      "The email has already been taken."
    ]
  },
  "response_time": 0.072494029998779
}
```

## Resources

This API offers `GET` resources to retrieve different data models by unique endpoints.

#### `GET /api/v0.1/buildings`

> Source: http://www.njit.edu/about/visit/njit-maps.php

```json
{
  "status": 200,
  "response": {
    "status": 200,
    "description": "OK",
    "type": "Successful",
    "is_successful": true
  },
  "message": null,
  "data": [
    {
      "id": 1,
      "name": "Student Mall \/ Parking Deck",
      "website_id": 1,
      "google_place_id": "ChIJP-qtPYJUwokRZp7m-pDLNoo",
      "created_at": "2016-08-13 01:36:34",
      "updated_at": "2016-08-13 01:36:34"
    },
    { ... }
  ],
  "response_time": 0.21713209152222
}
```

#### `GET /api/v0.1/events`

> Source: http://r25livepr1.njit.edu/calendar/

```json
{
  "status": 200,
  "response": {
    "status": 200,
    "description": "OK",
    "type": "Successful",
    "is_successful": true
  },
  "message": null,
  "data": [
    {
      "id": 1,
      "name": "NJ Region of the NYC Church of Christ",
      "summary": "NJ Region of the NYC Church of Christ",
      "location": "Campus Center Ballroom \"A\", Campus Center Conference Room 240, Campus Center Conference Room 220, Campus Center Conference Room 225",
      "dtstart": "20160814T080000",
      "dtend": "20160814T150000",
      "all_day": false,
      "organization": "Conference Services",
      "description": "None",
      "category": "Lecture, Seminar, Workshop",
      "created_at": "2016-08-16 06:03:24",
      "updated_at": "2016-08-16 06:03:24"
    },
    { ... }
  ],
  "response_time": 0.19863700866699
}
```

#### `GET /api/v0.1/sports`

> Source: http://njithighlanders.com/

```json
{
  "status": 200,
  "response": {
    "status": 200,
    "description": "OK",
    "type": "Successful",
    "is_successful": true
  },
  "message": null,
  "data": [
    {
      "id": 1201,
      "name": "Baseball",
      "gender": "o",
      "roster_url": "\/roster.aspx?path=baseball",
      "schedule_url": "\/schedule.aspx?path=baseball",
      "archives_url": "\/archives.aspx?path=baseball",
      "created_at": "2016-08-16 06:03:28",
      "updated_at": "2016-08-16 06:03:30",
      "athletes": [
        {
          "id": 18729,
          "number": 1,
          "image_url": "\/common\/controls\/image_handler.aspx?image_path=\/images\/2015\/9\/24\/Rex MacMillan.jpg&thumb_prefix=rp_roster",
          "name": "Rex MacMillan",
          "year": "Jr.",
          "height": "5-8",
          "weight": 155,
          "position": "UTL",
          "hometown": "Rutherford, NJ \/ Rutherford",
          "sport_id": 1201,
          "created_at": "2016-08-16 06:03:29",
          "updated_at": "2016-08-16 06:03:29"
        },
        { ... }
      ],
      "coaches": [
        {
          "id": 3150,
          "image_url": "\/common\/controls\/image_handler.aspx?image_path=\/images\/2011\/2\/22\/\/Brian Guiliana.jpg&thumb_prefix=rp_roster",
          "name": "Brian Guiliana",
          "title": "Head Baseball Coach",
          "sport_id": 1201,
          "created_at": "2016-08-16 06:03:30",
          "updated_at": "2016-08-16 06:03:30"
        },
        { ... }
      ]
    },
  ],
  "response_time": 0.081201076507568
}
```