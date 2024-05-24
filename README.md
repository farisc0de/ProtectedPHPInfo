# ProtectedPHPInfo
PHP Info with Password Protection

## Features

1. User management through JSON File
2. Password Hashed for each user
3. Secure Login Page

## Default User

1. Username: admin
2. Password: admin

## How to add a new user

```

{
  "users": [
    ...
    {
      "id": 2,
      "username": "admin",
      "password": password_hash("admin")
    }
  ]
}

```

## Screenshot

![image](https://github.com/farisc0de/ProtectedPHPInfo/assets/76238196/f55eb26e-5f17-46e1-bf99-8663e978234b)

## License

MIT
