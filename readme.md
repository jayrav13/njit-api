# NJIT API

Welcome to NJIT's API! This is an open source project created by @jayrav13. Members of the community are encouraged to contribute!

## About

The purpose of building this project out is simple - there is a lot of data available on campus, but it is not in one place. Bringing this data together and making it available to students, courses and organizations will have a multiplying effect on what we're able to build for our community. Why not give it a try?

## Usage

There are two ways that this API can be used:

 1. Using a version hosted by us, found at https://njit-api.herokuapp.com 
 2. Cloning and hosting this version on your own.

Both methods will be discussed throughout this documentation.

## Getting Started

#### How do I sign up?

In this stage of the API, signing up involves an HTTP request. Here is an example using cURL:

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

#### Can you break down the response format?

Sure! The goal was to make a standardized response format across all resources. The four main keys are:

- `status`: This is an integer value representing the HTTP response code.
- `response`: This object provides additional values regarding HTTP response.
- `message`: In the event that a message needs to be returned, this field will include it.
- `data`: This is the primary field which will include response data. These responses will be predictable - you are encouraged to play with the various endpoints to learn their behaviours.
- `response_time`: An approximate response time for the server.


#### What does this API offer?

This is a great question to start with. As of today, this API offers the below resources to be consumed:

`GET /api/v0.1/buildings`

> The response is an array of buildings on campus. Source: http://www.njit.edu/about/visit/njit-maps.php

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

`GET /api/v0.1/events`

> The Event object includes key data such as start and end times, whether or not this is an all day event, etc. Source: http://r25livepr1.njit.edu/calendar/

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

`GET /api/v0.1/sports`

> Each of the Sport objects contains relations to other objects, including Athlete and Coach. By calling this endpoint, you receive all of that data back in one giant HTTP response. Source: http://njithighlanders.com/

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