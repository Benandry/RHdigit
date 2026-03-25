# MimiDigit ERP

MimiDigit ERP est une application SaaS **multi-tenant** de type ERP moderne, développée avec Symfony et Twig, destinée à la gestion globale d'une organisation (PME/ETI).

Elle regroupe plusieurs modules métier dans une seule plateforme :
- Ressources humaines (RH)
- Achats
- Finance & Comptabilité
- CRM
- Projets & Business Intelligence
- Production & Logistique
- Administration & Intégrations

---

## 1. Caractéristiques principales

- Architecture SaaS multi-entreprise (multi-tenant, isolation par `tenant_id`)
- Stack : Symfony 7.x, Twig, Doctrine ORM, base relationnelle (PostgreSQL/MySQL)
- RBAC avancé (rôles, permissions granulaires par module)
- API REST (JSON) pour exposer la plupart des fonctionnalités
- Intégrations possibles avec ERP/paie/CRM externes
- Module BI avec KPI, dashboards et exports (CSV/PDF)

---

## 2. Modules fonctionnels

- Tableau de bord
- Notifications
- Ressources humaines
  - Employés
  - Départements
  - Contrats
  - Postes
  - Absences & documents
- Achats
  - Commandes
  - Fournisseurs
- Finance & Comptabilité
  - Comptabilité
  - Trésorerie
  - Budget
- CRM
  - Clients
  - Affaires
- Projets & Business Intelligence
  - Gestion de projets
  - BI (KPI, dashboards, rapports, exports)
- Production & Logistique
  - Production
  - Stock & Entrepôt
  - Transport & livraisons
- Administration
  - Utilisateurs & rôles (RBAC)
  - Paramètres système
  - Journal d’audit
  - Intégrations & API

---

## 3. Prérequis

- PHP >= 8.2
- Composer
- Base de données (PostgreSQL ou MySQL)
- Extensions PHP usuelles pour Symfony
- Node.js / npm ou yarn (pour les assets si utilisés)
- Symfony CLI recommandé

---

## 4. Installation (développement)

```bash
git clone https://github.com/<votre-compte>/mimidigit-erp.git
cd mimidigit-erp

composer install

# Configuration de l'environnement
cp .env .env.local
# Modifier .env.local pour la connexion à la base (DATABASE_URL, etc.)

# Création de la base
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
# Optionnel : chargement de données de démo
# php bin/console doctrine:fixtures:load

# Lancer le serveur Symfony
symfony server:start -d
```

Application accessible par défaut sur :  
`https://127.0.0.1:8000` (ou URL fournie par symfony-cli).

---

## 5. Concepts d’architecture

### Multi-tenant

- Entité `Tenant` représentant chaque entreprise cliente
- Champ `tenant_id` sur toutes les entités métier
- Filtre Doctrine pour restreindre toutes les requêtes au tenant courant

### Sécurité & RBAC

- Entités `User`, `Role`, `Permission`
- Permissions nommées par module (ex. `hr.employee.view`, `finance.invoice.approve`)
- Vérification des droits via le composant Security de Symfony (Voters, attributs `#[IsGranted]`)

### API

- Préfixe : `/api/v1`
- Format : JSON
- Endpoints CRUD par module + endpoints spécifiques (workflows, rapports)

---

## 6. Structure du projet (simplifiée)

- `src/Controller/Backoffice/*` : contrôleurs web (Twig)
- `src/Controller/Api/*` : contrôleurs API REST
- `src/Domain/*` : logique métier (entités, services)
- `src/Infrastructure/*` : repositories, intégrations externes
- `templates/` : vues Twig
- `migrations/` : migrations Doctrine

---

## 7. Roadmap (MVP)

**MVP :**
- Multi-tenant (gestion des Tenants, filtrage `tenant_id`)
- Authentification + RBAC de base
- Module RH : employés, départements, postes, contrats, absences
- Module CRM : clients, affaires
- Module Achats : fournisseurs, commandes
- Tableau de bord simple
- Journal d’audit minimal
- API CRUD pour RH & CRM

**Étapes suivantes :**
- Finance & Comptabilité
- BI avancée (KPI, dashboards, exports)
- Production & Logistique
- Notifications, intégrations externes

---

## 8. Licence

(À compléter : MIT, proprietary, etc.)

---

## 9. Auteurs

- MimiDigit ERP – projet conçu et développé par Herinandrianina Eloi Charly RANDRIAMIHAINGO.