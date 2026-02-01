# Mini Shop — Guide des Commandes

> Référence rapide des commandes Docker et Symfony/Doctrine pour ce projet.

---

## Table des matières

- [Docker](#docker)
  - [Lancer le projet](#lancer-le-projet)
  - [Commandes utiles](#commandes-utiles)
  - [Exécuter des commandes dans le conteneur](#exécuter-des-commandes-dans-le-conteneur)
- [Doctrine (Base de données)](#doctrine-base-de-données)
  - [Gestion de la BDD](#gestion-de-la-bdd)
  - [Migrations](#migrations)
  - [Workflow type : ajouter une propriété](#workflow-type--ajouter-une-propriété)
- [Symfony](#symfony)
  - [Installer un bundle](#installer-un-bundle)
- [Ressources](#ressources)

---

## Docker

### Lancer le projet

```bash
# Sans Dockerfile (compose.yaml uniquement)
docker compose up -d

# Avec Dockerfile (rebuild l'image)
docker compose up -d --build
```

> Le flag `-d` lance les conteneurs en mode **détaché** (en arrière-plan).

### Commandes utiles

| Commande | Description |
|----------|-------------|
| `docker ps` | Liste tous les conteneurs actifs |
| `docker ps -a` | Liste tous les conteneurs (actifs + arrêtés) |
| `docker compose down` | Arrête et supprime les conteneurs |
| `docker compose logs -f` | Affiche les logs en temps réel |
| `docker compose restart` | Redémarre les conteneurs |

### Exécuter des commandes dans le conteneur

```bash
docker exec <nom-conteneur> <commande>
```

**Exemples :**

```bash
# Lancer une commande Symfony
docker exec symfony-docker-php-1 php bin/console cache:clear

# Ouvrir un shell interactif
docker exec -it symfony-docker-php-1 bash
```

> **Astuce** — Pour trouver le nom exact du conteneur, utilisez `docker ps`.

---

## Doctrine (Base de données)

### Gestion de la BDD

```bash
# Créer la base de données
php bin/console doctrine:database:create --if-not-exists

# Supprimer la base de données
php bin/console doctrine:database:drop --force

# Valider le schéma
php bin/console doctrine:schema:validate
```

### Migrations

```bash
# Générer une migration (après modification d'entité)
php bin/console make:migration

# Appliquer les migrations
php bin/console doctrine:migrations:migrate

# Voir le statut des migrations
php bin/console doctrine:migrations:status

# Rollback de la dernière migration
php bin/console doctrine:migrations:migrate prev
```

> **Raccourci** — `d:m:m` équivaut à `doctrine:migrations:migrate`

### Workflow type : ajouter une propriété

**Exemple : Ajouter `stock` à l'entité `Product`**

1. **Modifier l'entité** (ou utiliser le maker)
   ```bash
   php bin/console make:entity Product
   ```
   - Nom : `stock`
   - Type : `integer`
   - Nullable : `no`

2. **Générer la migration**
   ```bash
   php bin/console make:migration
   ```

3. **Appliquer la migration**
   ```bash
   php bin/console d:m:m
   ```

**Résultat attendu :**
- `src/Entity/Product.php` — nouvelle propriété + getter/setter
- `migrations/VersionXXX.php` — fichier de migration généré

---

## Symfony

### Installer un bundle

```bash
# Depuis le conteneur Docker
docker exec symfony-docker-php-1 composer require <package>
```

**Exemples :**

```bash
# Twig (templating)
docker exec symfony-docker-php-1 composer require symfony/twig-bundle

# Doctrine ORM
docker exec symfony-docker-php-1 composer require symfony/orm-pack

# Maker Bundle (dev)
docker exec symfony-docker-php-1 composer require --dev symfony/maker-bundle
```

---

## Ressources

| Ressource | Lien |
|-----------|------|
| Documentation Twig | [twig.symfony.com](https://twig.symfony.com/) |
| Documentation Symfony | [symfony.com/doc](https://symfony.com/doc/current/index.html) |
| Documentation Doctrine | [doctrine-project.org](https://www.doctrine-project.org/projects/orm.html) |
| Docker Compose | [docs.docker.com/compose](https://docs.docker.com/compose/) |

---

<p align="center">
  <sub>Mini Shop — Symfony + Docker</sub>
</p>
