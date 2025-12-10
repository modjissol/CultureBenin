#!/usr/bin/env bash
# Script to deploy to Railway. Requires RAILWAY_TOKEN and optionally RAILWAY_PROJECT_ID set in environment.
set -euo pipefail

if [ -z "${RAILWAY_TOKEN:-}" ]; then
  echo "RAILWAY_TOKEN is not set. Create an API key in Railway and set RAILWAY_TOKEN." >&2
  exit 1
fi

# Install railway CLI if not present
if ! command -v railway >/dev/null 2>&1; then
  npm install -g @railway/cli
fi

railway login --apiKey "$RAILWAY_TOKEN"

if [ -n "${RAILWAY_PROJECT_ID:-}" ]; then
  railway link --projectId "$RAILWAY_PROJECT_ID" || true
fi

# Deploy current branch
railway up --yes

# Run migrations
railway run -- php artisan migrate --force || true

echo "Deploiement Railway termine."
