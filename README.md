# Write.mv

Write.mv is an Open Source micro blogging platform.

# Important to know

This was a side project I started for fun. Due to some difficulties I wasn't able to continue with the project. The code for this ofcourse isn't gonna be perfect but anyone is welcome to make it better and play around with it. Cheers : )

## Mission

The main goal of Write.mv is to give anyone a space on the web to freely share their stories & knowledge online without the need for any technical knowledge to set up their own blog. 


#### ===== Important docs ======

- [Publishing guidelines](https://github.com/write-mv/policies/blob/main/PublishingGuideline.md)

- [Comment guidelines](https://github.com/write-mv/policies/blob/main/CommentGuideline.md)


## Development Setup

Clone the repo

```bash
composer install
```

```bash
npm install
```

```bash
npm run dev
```

Configure `.env`

```
DB_CONNECTION=mysql
DB_HOST=host.docker.internal
DB_PORT=3306
DB_DATABASE=writemv
DB_USERNAME=
DB_PASSWORD=

CACHE_DRIVER=redis
```
Then run

```bash
sail up
```

Application will be live at: `localhost:8085`
