# Déploiement sur Render (sans Docker)

Ce guide explique comment déployer l'application `CultureBenin` sur Render en utilisant `render.yaml` fourni.

1) Pré-requis
- Avoir un compte Render et être connecté.
- Le dépôt est déjà sur GitHub: `https://github.com/modjissola81-afk/CultureBenin.git`.
- Avoir généré `APP_KEY` localement (commande ci‑dessous).

2) Importer `render.yaml` (optionnel)
- Sur Render: New -> Import from repo -> choisissez `modjissola81-afk/CultureBenin`.
- Vous pouvez également créer manuellement un Web Service et copier les valeurs du fichier `render.yaml`.

3) Valeurs à coller dans les champs du service (si import manuel)
- Build Command (champ Build Command):

  bash -lc "composer install --no-dev --no-interaction --optimize-autoloader && npm ci && npm run build && php artisan storage:link || true"

  (ou si vous n'utilisez pas `npm`/vite):

  bash -lc "composer install --no-dev --no-interaction --optimize-autoloader && php artisan storage:link || true"

- Start Command (champ Start Command):

  php artisan serve --host 0.0.0.0 --port $PORT

4) Variables d'environnement à définir (Environment -> Environment Variables)
- APP_ENV=production
- APP_DEBUG=false
- APP_KEY=<collez la clé générée localement>
- APP_URL=https://<votre-service>.onrender.com

Base de données (si Render DB):
- DB_CONNECTION=pgsql  (ou mysql)
- DB_HOST=
- DB_PORT=
- DB_DATABASE=
- DB_USERNAME=
- DB_PASSWORD=

Mail / autres (optionnel mais recommandé):
- MAIL_MAILER=smtp
- MAIL_HOST=
- MAIL_PORT=
- MAIL_USERNAME=
- MAIL_PASSWORD=
- MAIL_ENCRYPTION=tls
- CACHE_DRIVER=file
- QUEUE_CONNECTION=sync

Admin (optionnel):
- ADMIN_LOGIN_MODE=exact
- ADMIN_EMAIL=maurice.comlan@uac.bj
- ADMIN_PASSWORD=Eneam123

5) Générer `APP_KEY` localement
Exécutez dans votre projet local:

```powershell
php artisan key:generate --show
```

Copiez la valeur et collez-la dans la variable `APP_KEY` sur Render.

6) Après le premier déploiement (post-deploy)
- Ouvrez la console Shell du service (Render -> Service -> Shell) et exécutez:

```bash
php artisan migrate --force
php artisan storage:link || true
php artisan config:cache
php artisan route:cache
```

- Vous pouvez ajouter `php artisan migrate --force` comme Deploy Hook (Settings -> Deploy Hooks)
  pour l'exécuter automatiquement après chaque déploiement.

7) Vérifications
- Visitez l'URL fournie par Render.
- Testez l'upload d'un média et vérifiez que l'image s'affiche.
- Si les images ne s'affichent pas, vérifiez la présence des fichiers:

```bash
ls -la storage/app/public/uploads/medias
ls -la public/storage/uploads/medias
```

8) Remarques
- `php artisan serve` est suffisant pour un test ou un site à faible trafic ; pour la production
  vous pouvez remplacer la start command par `heroku-php-apache2 public/` si vous le souhaitez.
- Ne committez jamais votre fichier `.env`.

---

Si vous voulez, je peux maintenant :
- Committer automatiquement ces deux fichiers (render.yaml + README) et pousser sur `origin/main` (je peux le faire pour vous),
- Ou vous préférez que je vous guide pour faire le commit/push localement.
