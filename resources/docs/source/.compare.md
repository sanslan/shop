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


<!-- START_7fef01e7235c89049ebe3685de4bff17 -->
## api/v1/user/register
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/user/register`


<!-- END_7fef01e7235c89049ebe3685de4bff17 -->

<!-- START_7a184547882598fc164c10be7745584b -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/user/login`


<!-- END_7a184547882598fc164c10be7745584b -->

<!-- START_8a4d15dcbadf16adf64dd6109f40540a -->
## api/v1/user/profile
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/user/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/profile"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/user/profile`


<!-- END_8a4d15dcbadf16adf64dd6109f40540a -->

<!-- START_110d868e556badec86f25475bf3c797d -->
## api/v1/staff/register
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/register`


<!-- END_110d868e556badec86f25475bf3c797d -->

<!-- START_c60c40095ad85bace0228eddaf34cd7b -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/login`


<!-- END_c60c40095ad85bace0228eddaf34cd7b -->

<!-- START_6490fe5ffdff2ce2ea80e9c46970f4c3 -->
## Log the user out (Invalidate the token).

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/logout`


<!-- END_6490fe5ffdff2ce2ea80e9c46970f4c3 -->

<!-- START_c8b5e2ab365ef9b74c70ec06413a73bd -->
## api/v1/staff/profile
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/profile"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/profile`


<!-- END_c8b5e2ab365ef9b74c70ec06413a73bd -->

<!-- START_8621c17b75a53c75bce03acb0ff62ff4 -->
## api/v1/shop/user/register
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/shop/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/shop/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/shop/user/register`


<!-- END_8621c17b75a53c75bce03acb0ff62ff4 -->

<!-- START_6467ed98b78803b300303d0bb8078814 -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/shop/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/shop/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/shop/user/login`


<!-- END_6467ed98b78803b300303d0bb8078814 -->

<!-- START_4cee94de930195c1b316e3e81cd3f66f -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/delivery/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/delivery/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/delivery/login`


<!-- END_4cee94de930195c1b316e3e81cd3f66f -->

<!-- START_4ed31a9bf7713ef60a299e8fbdcf8609 -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/delivery/courier/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/delivery/courier/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/delivery/courier/login`


<!-- END_4ed31a9bf7713ef60a299e8fbdcf8609 -->

<!-- START_687a3e66967ba54628d99a7c207518bb -->
## api/v1/staff/navigation
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/navigation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/navigation"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/navigation`


<!-- END_687a3e66967ba54628d99a7c207518bb -->

<!-- START_202e4d4274b2410f33dcfc70f3c7f432 -->
## Display a listing of the users.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/users"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/users`


<!-- END_202e4d4274b2410f33dcfc70f3c7f432 -->

<!-- START_c9128642ec015bd6cf67d78ffa0b0d48 -->
## Display the user addresses.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/users/addresses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/users/addresses/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/users/addresses/{user}`


<!-- END_c9128642ec015bd6cf67d78ffa0b0d48 -->

<!-- START_7dde7c704a00f6a7b86517673253c74b -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/users/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/users/{user}`


<!-- END_7dde7c704a00f6a7b86517673253c74b -->

<!-- START_1fb9c45626a909e38891c4bc95aab330 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/user/{user}`


<!-- END_1fb9c45626a909e38891c4bc95aab330 -->

<!-- START_800643f57190a343fcad20174f44017a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/categories"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/categories`


<!-- END_800643f57190a343fcad20174f44017a -->

<!-- START_2cab8e2c4554c6c4b8db672eb4eff424 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/categories/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/categories/{category}`


<!-- END_2cab8e2c4554c6c4b8db672eb4eff424 -->

<!-- START_380ef43cfa05ff12b83a7445214d186e -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/categories`


<!-- END_380ef43cfa05ff12b83a7445214d186e -->

<!-- START_7cd4425e4e8ba1033562eda432f6df4f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/category/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/category/{category}`


<!-- END_7cd4425e4e8ba1033562eda432f6df4f -->

<!-- START_a3165ff2532762d501e70ed3c2be08a0 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/subcategories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/subcategories/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/subcategories/{sub_category}`


<!-- END_a3165ff2532762d501e70ed3c2be08a0 -->

<!-- START_2609212de1b09b59bf0b844638601c2d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/subcategories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/subcategories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/subcategories`


<!-- END_2609212de1b09b59bf0b844638601c2d -->

<!-- START_fd8df9432f091069dec036b09fa06be2 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/subcategory/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/subcategory/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/subcategory/{subcategory}`


<!-- END_fd8df9432f091069dec036b09fa06be2 -->

<!-- START_9159aee93c1c7d86de5e3e8f08f58cf9 -->
## Display a listing of the resource

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/shops" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/shops`


<!-- END_9159aee93c1c7d86de5e3e8f08f58cf9 -->

<!-- START_724c7c66d4d7eaa1c366fa307852e022 -->
## api/v1/staff/shops/statuses
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/shops/statuses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/statuses"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/shops/statuses`


<!-- END_724c7c66d4d7eaa1c366fa307852e022 -->

<!-- START_cd824e7b5e771099fa5c1fe01e7285e8 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/shops/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/shops/{shop}`


<!-- END_cd824e7b5e771099fa5c1fe01e7285e8 -->

<!-- START_81e64aa3213d966dc88e1fb1ea66edf1 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/shops" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/shops`


<!-- END_81e64aa3213d966dc88e1fb1ea66edf1 -->

<!-- START_5f8671d5f50ae6deb67aa2558de9e423 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/shops/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/shops/categories`


<!-- END_5f8671d5f50ae6deb67aa2558de9e423 -->

<!-- START_b08eb197ba0db009d2d0c4ac5c46953d -->
## api/v1/staff/shops/categories
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/shops/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/shops/categories`


<!-- END_b08eb197ba0db009d2d0c4ac5c46953d -->

<!-- START_2b288779f8519be9ffd010cd9b176008 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/shop/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shop/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/shop/{shop}`


<!-- END_2b288779f8519be9ffd010cd9b176008 -->

<!-- START_6390868cc294ab7cf20b8dfc6eef5115 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/shops/1/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/1/branches"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/shops/{shop_id}/branches`


<!-- END_6390868cc294ab7cf20b8dfc6eef5115 -->

<!-- START_78b3570679e8b4e20743a59cb483b620 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/shops/branch/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/branch/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/shops/branch/{shop_branch}`


<!-- END_78b3570679e8b4e20743a59cb483b620 -->

<!-- START_b68ae0565a1a4fa6c8d06d93743be29b -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/shops/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/branches"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/shops/branches`


<!-- END_b68ae0565a1a4fa6c8d06d93743be29b -->

<!-- START_465b704c501b2cb1880d0b63c27693b0 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/shops/branch/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/branch/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/shops/branch/{shop_branch}`


<!-- END_465b704c501b2cb1880d0b63c27693b0 -->

<!-- START_40826846116741342f383486f4d1eaa7 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/shops/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/1/users"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/shops/{shop_id}/users`


<!-- END_40826846116741342f383486f4d1eaa7 -->

<!-- START_3ab2cb419920ea5fbb9a3a0415ef122e -->
## Display shop user roles.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/shops/users/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/users/roles"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/shops/users/roles`


<!-- END_3ab2cb419920ea5fbb9a3a0415ef122e -->

<!-- START_c061495f44f21498ced21cbe30bf383a -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/shops/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/shops/users`


<!-- END_c061495f44f21498ced21cbe30bf383a -->

<!-- START_8d897722016db424e29f3b1ab8fc1d22 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/shops/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/shops/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/shops/users/{shop_user}`


<!-- END_8d897722016db424e29f3b1ab8fc1d22 -->

<!-- START_faef742ad048daa189990f226af08b7e -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/staff_users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/staff_users"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/staff_users`


<!-- END_faef742ad048daa189990f226af08b7e -->

<!-- START_75ded73a77628a60f2dd5e2cb3610e63 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/staff_users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/staff_users/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/staff_users/{user}`


<!-- END_75ded73a77628a60f2dd5e2cb3610e63 -->

<!-- START_15c8b712215d61f99942dc6be76c1407 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/staff_users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/staff_users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/staff_users`


<!-- END_15c8b712215d61f99942dc6be76c1407 -->

<!-- START_57269c2867e13bbc0f59aa8d9d8667d7 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/staff_user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/staff_user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/staff_user/{user}`


<!-- END_57269c2867e13bbc0f59aa8d9d8667d7 -->

<!-- START_1239227b08dfd807bd8737bbc087854d -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/brands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/brands"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/brands`


<!-- END_1239227b08dfd807bd8737bbc087854d -->

<!-- START_c0d4c8d65b3435e6ed8654e8d07f1596 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/brands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/brands/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/brands/{brand}`


<!-- END_c0d4c8d65b3435e6ed8654e8d07f1596 -->

<!-- START_1d0d117b5935275c3e8526f8d9b97f4c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/brands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/brands"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/brands`


<!-- END_1d0d117b5935275c3e8526f8d9b97f4c -->

<!-- START_7231aba2b17a75659c99181648835207 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/brands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/brands/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/brands/{brand}`


<!-- END_7231aba2b17a75659c99181648835207 -->

<!-- START_5dff963c9660e06277b8ea2b6cce95bf -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/staff/brands/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/brands/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/staff/brands/{brand}`


<!-- END_5dff963c9660e06277b8ea2b6cce95bf -->

<!-- START_9cb221d399d8470be233ab7cfe0c2053 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/delivery_companies/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies/1/users"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/delivery_companies/{company_id}/users`


<!-- END_9cb221d399d8470be233ab7cfe0c2053 -->

<!-- START_cf7e2241b672e2995c1ec05cb88d67eb -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/delivery_companies/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies/users/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/delivery_companies/users/{user_id}`


<!-- END_cf7e2241b672e2995c1ec05cb88d67eb -->

<!-- START_c15bec2136ce40322189c2382a860a6b -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/delivery_companies/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/delivery_companies/users/{user_id}`


<!-- END_c15bec2136ce40322189c2382a860a6b -->

<!-- START_587e4cc865670acf9fac205d7e18b319 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/delivery_companies/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/delivery_companies/users`


<!-- END_587e4cc865670acf9fac205d7e18b319 -->

<!-- START_da135bff9ed26fc65baae1c21221f0d5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/delivery_companies/1/couriers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies/1/couriers"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/delivery_companies/{company_id}/couriers`


<!-- END_da135bff9ed26fc65baae1c21221f0d5 -->

<!-- START_44fc30e0f87c02de1d3f3270dd9f1936 -->
## Display delivery companies.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/delivery_companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/delivery_companies`


<!-- END_44fc30e0f87c02de1d3f3270dd9f1936 -->

<!-- START_e30fc7e87937ffee9108ca1978915ddf -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/delivery_companies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/delivery_companies/{company_id}`


<!-- END_e30fc7e87937ffee9108ca1978915ddf -->

<!-- START_f56b22aa915c03b05920e21335fe3f2b -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/delivery_companies/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/delivery_companies/{company_id}`


<!-- END_f56b22aa915c03b05920e21335fe3f2b -->

<!-- START_86bd51d5987fb378f59e57918d73735c -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/delivery_companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/delivery_companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/delivery_companies`


<!-- END_86bd51d5987fb378f59e57918d73735c -->

<!-- START_80b1290aa81490972265ff3f9854d1c5 -->
## Display option types.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/options/types" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/types"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/options/types`


<!-- END_80b1290aa81490972265ff3f9854d1c5 -->

<!-- START_41cc0b70726785687207073545610d38 -->
## Display sub categories.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/options/sub_categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/sub_categories"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/options/sub_categories`


<!-- END_41cc0b70726785687207073545610d38 -->

<!-- START_717af406028739df44832629cd10240c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/options`


<!-- END_717af406028739df44832629cd10240c -->

<!-- START_17fb7827badbd643b2bf92e8349ab075 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/options/{option}`


<!-- END_17fb7827badbd643b2bf92e8349ab075 -->

<!-- START_e7317bd7f357dac2c440253003aa7830 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/options`


<!-- END_e7317bd7f357dac2c440253003aa7830 -->

<!-- START_5d2ba19e3aa8fba7f4358150fb1730d5 -->
## Create option value.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/options/values/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/values/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/options/values/{option}`


<!-- END_5d2ba19e3aa8fba7f4358150fb1730d5 -->

<!-- START_08ac772b5b72a29d0828ea11c98bbd16 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/options/values/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/values/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/options/values/{option}`


<!-- END_08ac772b5b72a29d0828ea11c98bbd16 -->

<!-- START_03a5856c8cd713ca43c1e6668622ea5d -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/options/{option}`


<!-- END_03a5856c8cd713ca43c1e6668622ea5d -->

<!-- START_c13ebed79645003e1f8ef3c56a0be8cc -->
## Remove option value and its translations

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/staff/options/value/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/value/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/staff/options/value/{option_value}`


<!-- END_c13ebed79645003e1f8ef3c56a0be8cc -->

<!-- START_91e0006d0d710271f6d2ff7a52ba8881 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/staff/options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/options/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/staff/options/{option}`


<!-- END_91e0006d0d710271f6d2ff7a52ba8881 -->

<!-- START_23ceda89c9feb7fd33a68045a6bee637 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/products/upload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/upload"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/products/upload`


<!-- END_23ceda89c9feb7fd33a68045a6bee637 -->

<!-- START_7aa9b48bafba779fc24c205b0d8983bb -->
## Get categories.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/categories"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/categories`


<!-- END_7aa9b48bafba779fc24c205b0d8983bb -->

<!-- START_5820e6f10f4eb29b5b1844fb6e203b0b -->
## Get sub categories of category.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/sub_categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/sub_categories/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/sub_categories/{category}`


<!-- END_5820e6f10f4eb29b5b1844fb6e203b0b -->

<!-- START_6643dcd97140606fec158ea82617b8c2 -->
## Get shops list.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/shops" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/shops"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/shops`


<!-- END_6643dcd97140606fec158ea82617b8c2 -->

<!-- START_de9a158eb36a06273372459374a65832 -->
## Get shop branches.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/shop_branches/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/shop_branches/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/shop_branches/{shop}`


<!-- END_de9a158eb36a06273372459374a65832 -->

<!-- START_48e682aa1a47750cee64e1057746a3d3 -->
## Get shop branches.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/brands" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/brands"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/brands`


<!-- END_48e682aa1a47750cee64e1057746a3d3 -->

<!-- START_abcb0270784c4c352c7304ce91e11f19 -->
## Display category options.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/get_sub_category_options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/get_sub_category_options/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/get_sub_category_options/{subCategory}`


<!-- END_abcb0270784c4c352c7304ce91e11f19 -->

<!-- START_bd9c0a41ebd6feb70d48d0c0a9291571 -->
## Display option values.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/option_values/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/option_values/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/option_values/{option}`


<!-- END_bd9c0a41ebd6feb70d48d0c0a9291571 -->

<!-- START_7662c1d0d257a626280ee7fc652b126a -->
## Display products.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products`


<!-- END_7662c1d0d257a626280ee7fc652b126a -->

<!-- START_a79b967c249c30b14625a2892fc116af -->
## Display product options.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/1/get_product_options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/1/get_product_options"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/{product_id}/get_product_options`


<!-- END_a79b967c249c30b14625a2892fc116af -->

<!-- START_bd36a056475d63c6ecf2df7124b4a6fb -->
## Display product custom options.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/1/get_product_custom_options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/1/get_product_custom_options"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/{product_id}/get_product_custom_options`


<!-- END_bd36a056475d63c6ecf2df7124b4a6fb -->

<!-- START_d19195670d85f73dcc3dd7187ab112de -->
## Display product.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/staff/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/1"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/staff/products/{product}`


<!-- END_d19195670d85f73dcc3dd7187ab112de -->

<!-- START_831dad3a93778b7dc5834ec4513b8d6f -->
## Store a product with translation.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/products`


<!-- END_831dad3a93778b7dc5834ec4513b8d6f -->

<!-- START_ddf7015d635469822e880383147650e8 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/products/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/products/{product}`


<!-- END_ddf7015d635469822e880383147650e8 -->

<!-- START_5c0b0f28b531c58768b32ad8d289e360 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/staff/products/image/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/image/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/staff/products/image/{image}`


<!-- END_5c0b0f28b531c58768b32ad8d289e360 -->

<!-- START_094c2da2c59e99d86eaa747e51758a5b -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/staff/products/options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/options/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/v1/staff/products/options/{product_option}`


<!-- END_094c2da2c59e99d86eaa747e51758a5b -->

<!-- START_b85ad47066e56303140ed569b309ef61 -->
## Store a product with translation.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/products/options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/options"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/products/options`


<!-- END_b85ad47066e56303140ed569b309ef61 -->

<!-- START_21a236358cca49b1c87f8918fc343a01 -->
## Store a product with translation.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/staff/products/custom_options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/custom_options"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/staff/products/custom_options`


<!-- END_21a236358cca49b1c87f8918fc343a01 -->

<!-- START_4c59fb984e12dc5c499348f95b87ca99 -->
## Update product custom option.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/staff/products/custom_options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/staff/products/custom_options/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/staff/products/custom_options/{product_option}`


<!-- END_4c59fb984e12dc5c499348f95b87ca99 -->

<!-- START_63154f96df0bca2b652310f7fb27087c -->
## api/v1/data/countries
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/data/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/data/countries"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/data/countries`


<!-- END_63154f96df0bca2b652310f7fb27087c -->

<!-- START_6bb4566a10a9ceb1e3542f45152eabc1 -->
## api/v1/data/country/cities
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/data/country/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/data/country/cities"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/data/country/cities`


<!-- END_6bb4566a10a9ceb1e3542f45152eabc1 -->

<!-- START_0b4a4b3fb29f013e39e88f0bb109166d -->
## api/v1/data/city/states
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/data/city/states" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/data/city/states"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/data/city/states`


<!-- END_0b4a4b3fb29f013e39e88f0bb109166d -->

<!-- START_635309224d1694d97ca6a2d5d54b3154 -->
## api/v1/data/weeks
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/data/weeks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/data/weeks"
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


> Example response (401):

```json
{
    "message": "Sayta daxil olunmayıb"
}
```

### HTTP Request
`GET api/v1/data/weeks`


<!-- END_635309224d1694d97ca6a2d5d54b3154 -->


