---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_4dfafe7f87ec132be3c8990dd1fa9078 -->
## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/sanctum/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET sanctum/csrf-cookie`


<!-- END_4dfafe7f87ec132be3c8990dd1fa9078 -->

<!-- START_e168b47ce8c7a216916efdaa9d3f011e -->
## Store a New Subscriber for a Website

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/websites/laboriosam/subscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"subscriber_id":17}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/websites/laboriosam/subscribe"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "subscriber_id": 17
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{}
```

### HTTP Request
`POST api/v1/websites/{id}/subscribe`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | integer required ID of the Website
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `subscriber_id` | integer |  optional  | ID of the Subscriber
    
<!-- END_e168b47ce8c7a216916efdaa9d3f011e -->

<!-- START_5e96f1f289997d5928ca34fcc11c6df6 -->
## Create a New Post

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/websites/debitis/post" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"ut","description":"modi"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/websites/debitis/post"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "ut",
    "description": "modi"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "New Post created successfully",
    "data": {
        "title": "Post 1",
        "description": "Description of Post 1",
        "website_id": 1,
        "updated_at": "2022-06-14T20:40:51.000000Z",
        "created_at": "2022-06-14T20:40:51.000000Z",
        "id": 2
    }
}
```

### HTTP Request
`POST api/v1/websites/{website}/post`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `website` |  optional  | integer required ID of the Website
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  optional  | Title of the Post
        `description` | string |  optional  | Description of the Post
    
<!-- END_5e96f1f289997d5928ca34fcc11c6df6 -->


