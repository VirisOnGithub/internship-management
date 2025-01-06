---
title: Projet ISIWeb
author: [Clément RENIERS, Simon PRIBYLSKI]
---

# Organisation du binôme

L'organisation s'est développé selon les compétences de chacun. Simon, plus adepte du back-end, a pris en charge la partie serveur et la base de données (PHP, MySQL). Clément, plus orienté front-end, a pris en charge la partie client (Twig). Les interactions entre les deux parties ont dû en revanche être nombreuses pour que le projet soit cohérent.

# Difficultés rencontrées

Côté PHP, un temps important à été passé à écrire le code des classes du modèle avec leur documentation. Sinon, aucune difficulté particulière n'a été rencontrée mis à part les fonction pour les toasts dans `Toast.php`.
Côté front-end, la gestion des `extend` de Twig a été un peu compliquée à mettre en place au début, mais après quelques recherches, tout s'est bien passé. L'utilisation de certaines des classes de Bootstrap5 n'était pas non plus évidente, mais la documentation a bien aidé. Enfin, la gestion des types en base (notamment les dates) a été un peu compliquée, donc la base a été modifiée pour simplifier l'interaction entre PHP et MySQL.

# Architecture de l'application

Le fonctionnement de l'application est détaillé dans la documentation, générée par (à lancer à la racine de l'application) :
```bash
    doxygen && firefox doc/html/index.html
```
(firefox peut être remplacé par le navigateur de votre choix (sous Linux, google-chrome, chromium, etc...))

La seule modification apportée au projet initial est la modification de la recherche dans les différents onglets, performée par la bibliothèque [DataTables](https://datatables.net/).

# Fonctionnement de l'application