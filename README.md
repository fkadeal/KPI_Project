# KPI_Project
Track your Key Performance Indicators, Metrics and Business Data with insightful KPI Dashboards and Reports
<a href="https://github.com/cretueusebiu/laravel-nuxt/actions"><img src="https://github.com/cretueusebiu/laravel-nuxt/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/cretueusebiu/laravel-nuxt"><img src="https://poser.pugx.org/cretueusebiu/laravel-nuxt/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/cretueusebiu/laravel-nuxt"><img src="https://poser.pugx.org/cretueusebiu/laravel-nuxt/v/stable.svg" alt="Latest Stable Version"></a>

> A Laravel-Nuxt starter project template.

<div class="generic-holder tools-holder">
            <h2>All these tools in one place</h2>
            <p>
                <amp-img alt="A dashboard icon showing a dark theme and 4 graphs" width="180px" height="130px" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Dashboard-Tool.svg" class="i-amphtml-element i-amphtml-layout-fixed i-amphtml-layout-size-defined i-amphtml-built i-amphtml-layout" i-amphtml-layout="fixed" style="width: 180px; height: 130px;">
                <img decoding="async" alt="A dashboard icon showing a dark theme and 4 graphs" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Dashboard-Tool.svg" class="i-amphtml-fill-content i-amphtml-replaced-content"></amp-img>
                <span><strong>Dashboards</strong><br>Quickly bring your data to life with interactive charts and graphs</span>
            </p>

            <p>
                <amp-img alt="A report icon displaying a blue line graph" width="180px" height="130px" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Reports-Tool.svg" class="i-amphtml-element i-amphtml-layout-fixed i-amphtml-layout-size-defined i-amphtml-built i-amphtml-layout" i-amphtml-layout="fixed" style="width: 180px; height: 130px;">
                <img decoding="async" alt="A report icon displaying a blue line graph" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Reports-Tool.svg" class="i-amphtml-fill-content i-amphtml-replaced-content"></amp-img>
                <span><strong>Reports</strong><br>Create and share meaningful insights with teams and colleagues</span>
            </p>
            <p>
                <amp-img alt="An analytics icon of a monitor showing a magnifiying glass on top of a chart" width="180px" height="130px" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Analytics-Tool.svg" class="i-amphtml-element i-amphtml-layout-fixed i-amphtml-layout-size-defined i-amphtml-built i-amphtml-layout" i-amphtml-layout="fixed" style="width: 180px; height: 130px;">
                <img decoding="async" alt="An analytics icon of a monitor showing a magnifiying glass on top of a chart" src="https://cdn.simplekpi.com/images/SVGs/Home-KPI-Analytics-Tool.svg" class="i-amphtml-fill-content i-amphtml-replaced-content"></amp-img>
                <span><strong>Analytics</strong><br>Analyze the ups and downs to make sense of your data</span>
            </p>
        </div>

## Features
rack your Key Performance Indicators, Metrics and Business Data with insightful KPI Dashboards and Reports
- Nuxt 2
- Laravel 8
- SPA or SSR
- Socialite integration
- VueI18n + ESlint + Bootstrap 4 + Font Awesome 5
- Login, register, email verification and password reset

## Installation

- `composer create-project --prefer-dist cretueusebiu/laravel-nuxt`
- Edit `.env` and set your database connection details 
- (When installed via git clone or download, run `php artisan key:generate` and `php artisan jwt:secret`)
- `php artisan migrate`
- `npm install`

## Usage

### Development

```bash
# start Laravel
php artisan serve

# start Nuxt
npm run dev
```

Access your application at `http://localhost:3000`.

### Production

```bash
npm run build
```

### Enable SSR

- Edit `client/nuxt.config.js` and set `ssr: true` 
- Edit `.env` to set `APP_URL=http://api.example.com` and `CLIENT_URL=http://example.com`
- Run `npm run build` and `npm run start`

#### Nginx Proxy

For Nginx you can add a proxy using the follwing location block:

```
server {
    location / {
        proxy_pass http://http://127.0.0.1:3000;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
    }
}
```

#### Process Manager

In production you need a process manager to keep the Node server alive forever:

```bash
# install pm2 process manager
npm install -g pm2

# startup script
pm2 startup

# start process
pm2 start npm --name "laravel-nuxt" -- run start

# save process list
pm2 save

# list all processes
pm2 l
```

After each deploy you'll need to restart the process:

```bash
pm2 restart laravel-nuxt 
```

Make sure to read the [Nuxt docs](https://nuxtjs.org/).

## Socialite

This project comes with GitHub as an example for [Laravel Socialite](https://laravel.com/docs/5.8/socialite).

To enable the provider create a new GitHub application and use `https://example.com/api/oauth/github/callback` as the Authorization callback URL.

Edit `.env` and set `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` with the keys form your GitHub application.

For other providers you may need to set the appropriate keys in `config/services.php` and redirect url in `OAuthController.php`.

## Email Verification

To enable email verification make sure that your `App\User` model implements the `Illuminate\Contracts\Auth\MustVerifyEmail` contract.

## Notes

- This project uses [router-module](https://github.com/nuxt-community/router-module), so you have to add the routes manually in `client/router.js`.
- If you want to separate this in two projects (client and server api), move `package.json` into `client/` and remove config path option from the scripts section. Also make sure to add the env variables in `client/.env`.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
