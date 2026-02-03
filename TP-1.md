# Exercice Symfony + Twig — Page “About” + inclusion dans la Home

## Objectif
Tu vas créer une page **About** dans un projet Symfony et l’afficher **dans la page d’accueil**, **après la liste des produits**.

Contraintes pédagogiques :
- Tu dois utiliser un **HomeController** : c’est **dans ce controller** que tu ajouteras la route.
- La vue About doit **recevoir 2 variables** depuis le controller (juste pour pratiquer).
- Il n’y a **pas de lien** à créer : la section About doit être **incluse** dans la Home.

---

## Résultat attendu
À la fin, ton projet doit contenir :

- Un **HomeController** qui gère la Home **et** la page About (routes dedans)
- Une route dédiée à About (URL claire, ex: `/about`)
- Une vue Twig About qui affiche **2 variables**
- La page d’accueil qui affiche :
  1) les produits  
  2) puis la section About **incluse juste après**

---

## Les 2 variables à passer à la vue About
Depuis le controller, tu dois envoyer exactement **deux variables** à la vue About :

1. **`pageTitle`** : le titre de la section About  
2. **`nbActiveItems`** : `nbActiveItems` doit contenir le nombre de produits actifs affichés sur la page d’accueil.
Cette variable doit être calculée dans le controller, transmise à la vue About, puis affichée dans le template Twig.

Ces variables doivent être **affichées dans le template Twig About**.

---

## Étape 1 — Modifier l’HomeController
- Vérifie qu’il contient déjà une action/route pour la page d’accueil

👉 Important : **la route About doit être ajoutée dans ce même HomeController**.

---

## Étape 2 — Ajouter la route About dans HomeController
Dans `HomeController` :
- Ajoute une action dédiée pour About
- Associe-lui une route (ex: `/about`)
- Donne un nom de route clair

✅ Vérifie que la route existe en listant les routes Symfony (commande de debug).

---

## Étape 3 — Créer la vue Twig About
- Crée un template Twig dédié à About
- La vue doit afficher :
  - `pageTitle`
  - `nbActiveItems`


---

## Étape 4 — Passer les variables depuis AppController
Dans l’action About:
- Définis `pageTitle`
- Définis `nbActiveItems`
- Transmets-les à la vue About au rendu

---

## Étape 5 — Tester la page About seule
Avant l’inclusion dans la Home :
- Accède à l’URL About directement
- Vérifie que :
  - la page s’affiche
  - les 2 variables s’affichent
  - aucune erreur Twig/Symfony

---

## Étape 6 — Inclure About dans la Home après les produits
Objectif : afficher About **directement dans la page d’accueil**, juste après les produits.

- Dans le template de la Home (`index.html.twig`), repère la section où tu affiches les produits
- Juste après cette section, **inclue** la vue About (ou un partial About)
- La Home doit rester propre : pas de duplication inutile

⚠️ Attention : la Home n’a pas vocation à réécrire le contenu About en dur.  
Tu dois réutiliser Twig (inclusion) pour composer la page.

---

## Checklist de validation
- [ ] Un `HomeController` existe
- [ ] La route About est déclarée dans `HomeController`
- [ ] Un template Twig About existe
- [ ] `pageTitle` et `nbActiveItems` sont envoyées par le controller
- [ ] La vue About affiche bien ces deux variables
- [ ] La Home affiche les produits puis inclut About juste après
- [ ] Aucun lien n’a été ajouté (ce n’est pas l’objectif ici)

---

## Objectif pédagogique
- Pratiquer la relation **route → controller → vue**
- Pratiquer le passage de variables à Twig
- Apprendre à composer une page avec **inclusion Twig** plutôt que duplication

1. Créer un nouveau controller qui s'appelle `CartController`
2. Une méthode qui s'appellera `index`, qui va afficher le panier sur `/cart`.
3. Créer la vue de cette méthode : `cart/index.html.twig`
4. Passer une variable qui s'appelera `items` et qui sera un tableau de produits (utiliser la méthode `getDetailedItems` du CartService).
