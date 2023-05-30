[DigitalOcean Function](https://docs.digitalocean.com/products/functions/) to
ping a Drupal cron URL via [scheduled
triggers](https://docs.digitalocean.com/products/functions/how-to/schedule-functions/).

# Configuring and Deploying

The easiest way to deploy this is to [install and configure
`doctl`](https://docs.digitalocean.com/reference/doctl/how-to/install/). Then,
checkout this repository. Next, create [a `.env`
file](https://www.dotenv.org/docs/security/env.html) in the root of the
repository with the contents:

```env
CRON_URL=YOUR_URL
```

Where `YOUR_URL` is the cron URL Drupal offers you on the
`/admin/config/system/cron` page of the site you want to ping the cron of. Note
that it's also possible to place this file elsewhere and use [the `--env`
flag](https://docs.digitalocean.com/reference/doctl/reference/serverless/deploy/#flags)
when running `doctl serverless deploy`.

Your function should now be ready to deploy. To do so, run:

```bash
doctl serverless deploy /path/to/repository
```

Where `/path/to/repository` is either the absolute path to the folder
containing this readme or a relative path to the current directory. For more
information, see [the documentation for
`doctl serverless deploy`](https://docs.digitalocean.com/reference/doctl/reference/serverless/deploy/).
