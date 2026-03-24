# Backlog Detaille ERP RHdigit

## Objectif

Construire RHdigit comme un ERP modulaire fonde sur le menu du sidebar, en respectant le DDD et la Clean Architecture afin d'obtenir un code metier propre, maintenable et scalable.

Le sidebar devient la carte officielle des domaines fonctionnels du produit.

## Principes Directeurs

1. Un groupe du sidebar = un bounded context principal.
2. Le domaine metier ne depend jamais de Symfony, Doctrine, Twig ou d'un autre module non publie.
3. Les cas d'usage passent par Application via Command, Query et Handler.
4. Infrastructure contient les details techniques uniquement.
5. Presentation contient des controleurs fins, formulaires, view models et templates.
6. SharedKernel reste minimal et strictement transverse.
7. Les dependances entre contextes passent par contrats applicatifs, projections ou evenements.

## Carte Cible Des Domaines

1. AccessIdentity
2. EmployeManagement
3. LeaveManagement
4. Purchase
5. FinanceAccounting
6. CRM
7. ProjectBI
8. ProductionLogistics
9. Administration
10. SharedKernel

## Ordre De Livraison Recommande

1. Vague A: stabilisation du socle transversal, RH, identite et conges.
2. Vague B: achats et finance budgetaire.
3. Vague C: CRM et reporting BI.
4. Vague D: production, stock, logistique et integrations avancees.

---

## Epic 0 - Fondations DDD Et Clean Architecture

### But

Poser un cadre unique pour tous les modules avant d'etendre l'ERP.

### Stories

#### 0.1 - Definir la cartographie officielle des bounded contexts

- Identifier chaque groupe du sidebar comme contexte metier.
- Associer pour chaque contexte: owner metier, finalite, donnees possedees, utilisateurs cibles.
- Definir les frontieres entre contextes.

Critères d'acceptation:

- Une cartographie formelle existe pour tous les menus du sidebar.
- Chaque fonctionnalite du produit appartient a un seul contexte principal.
- Les responsabilites partagees sont explicites.

#### 0.2 - Unifier les conventions de nommage et d'arborescence

- Choisir une seule langue de code: anglais recommande.
- Normaliser les noms de classes, namespaces, routes, templates et dossiers.
- Uniformiser la structure Domain, Application, Infrastructure, Presentation dans tous les modules.

Critères d'acceptation:

- Aucun nouveau module n'introduit un nommage mixte francais-anglais.
- Tous les nouveaux contextes utilisent exactement la meme structure.
- Les conventions sont documentees et partagees.

#### 0.3 - Standardiser le squelette d'un module

- Definir le template de base d'un contexte.
- Definir les repertoires par couche et les contrats attendus.
- Definir les patterns autorises: Entity, Aggregate, ValueObject, Repository, DomainService, Policy, Command, Query, Handler.

Critères d'acceptation:

- Un nouveau module peut etre cree sans improvisation structurelle.
- Le meme squelette est reutilisable sur tous les domaines.

#### 0.4 - Definir les regles de dependances inter-modules

- Interdire les appels directs au Domain d'un autre contexte.
- Autoriser seulement les contrats applicatifs explicites, evenements et projections.
- Definir la strategie anti-corruption si un contexte consomme des donnees externes.

Critères d'acceptation:

- Les dependances permises et interdites sont explicites.
- Aucun module ne contourne Application pour parler a un autre contexte.

#### 0.5 - Mettre en place les briques transverses du SharedKernel

- Consolider les CommandBus et QueryBus.
- Definir les abstractions de pagination, identifiants, date/heure systeme, erreurs applicatives, audit metadata.
- Introduire les contrats de DomainEvent et IntegrationEvent.

Critères d'acceptation:

- SharedKernel ne contient pas de logique metier specifique.
- Les utilitaires partages sont limites et bien identifies.

---

## Epic 1 - AccessIdentity

### But

Fournir la securite, l'authentification et le controle d'acces de tout l'ERP.

### Sous-domaines

- Utilisateur
- Role
- Permission
- Session
- Verification d'email
- Recuperation de mot de passe
- Journal d'authentification

### Stories

#### 1.1 - Gerer les utilisateurs

- Creer un utilisateur.
- Modifier son profil de base.
- Activer ou desactiver un utilisateur.
- Gerer son statut de verification.

Critères d'acceptation:

- Un utilisateur peut etre cree sans exposer la persistence au domaine.
- Les regles de validite email et securite sont centralisees.

#### 1.2 - Gerer les roles et permissions

- Definir les roles systeme.
- Associer des permissions a des cas d'usage, pas uniquement a des pages.
- Assigner un ou plusieurs roles a un utilisateur.

Critères d'acceptation:

- Chaque action sensible du systeme est rattachee a une permission metier.
- Les roles peuvent evoluer sans casser les cas d'usage.

#### 1.3 - Securiser l'acces aux modules

- Bloquer l'acces aux modules selon permissions.
- Cacher les menus du sidebar selon habilitation.
- Journaliser les tentatives d'acces refusees.

Critères d'acceptation:

- Le sidebar ne montre que ce qui est autorise.
- Les actions refusees laissent une trace exploitable.

#### 1.4 - Gerer la connexion et la recuperation de compte

- Connexion.
- Deconnexion.
- Mot de passe oublie.
- Verification d'email.

Critères d'acceptation:

- Les parcours d'authentification critiques sont couverts par tests.
- Les tokens et mecanismes sensibles restent en Infrastructure/Application.

---

## Epic 2 - EmployeManagement

### But

Porter le coeur RH deja existant vers une base metier plus robuste et industrialisable.

### Sous-domaines

- Employe
- Departement
- Poste
- Contrat
- Organigramme
- Documents RH

### Stories

#### 2.1 - Stabiliser le modele Employe

- Revoir l'agregat Employe.
- Uniformiser sa creation via factory ou named constructor.
- Poser les invariants metier: CIN unique, age minimal, contrat requis, poste compatible.

Critères d'acceptation:

- Les invariants sont portes par le domaine.
- Aucun handler ne construit un employe en contournant les regles metier.

#### 2.2 - Gerer les departements

- Creer, modifier, supprimer un departement.
- Associer un responsable.
- Gerer le rattachement des employes.

Critères d'acceptation:

- Les relations employe-departement restent coherentes.
- Les suppressions invalides sont bloquees par le domaine.

#### 2.3 - Gerer les postes

- Creer et modifier un poste.
- Definir niveau, categorie, rattachement organisationnel.
- Verifier la compatibilite avec les contrats ou employes.

Critères d'acceptation:

- Les regles de rattachement sont explicites.
- Le poste reste un concept metier, pas un simple dictionnaire technique.

#### 2.4 - Gerer les contrats

- Creer un contrat.
- Gerer type, date d'effet, date de fin, salaire, statut.
- Lier contrat et employe selon regles metier.

Critères d'acceptation:

- Les periodes de contrat ne se chevauchent pas de maniere illegale.
- La validite d'un contrat est verifiee par le domaine.

#### 2.5 - Gerer les documents RH

- Associer des pieces jointes a un employe.
- Categotiser les documents.
- Historiser les depots et mises a jour.

Critères d'acceptation:

- Le stockage physique est en Infrastructure.
- Le domaine ne connait que les metadonnees utiles.

#### 2.6 - Produire l'organigramme et les vues RH

- Exposer des requetes de lecture dediees.
- Construire des projections pour le dashboard RH.

Critères d'acceptation:

- Les vues de lecture ne polluent pas les agregats domaine.
- Les tableaux de bord utilisent des queries optimisees.

---

## Epic 3 - LeaveManagement

### But

Gerer les conges, absences et workflows de validation en lien avec les employes.

### Sous-domaines

- TypeDeConge
- SoldeConge
- DemandeConge
- ValidationConge
- CalendrierAbsence

### Stories

#### 3.1 - Definir les types de conges

- Creer des types de conges.
- Definir les regles de consommation.
- Associer les politiques d'approbation.

Critères d'acceptation:

- Les types de conges peuvent evoluer sans changer les demandes existantes.

#### 3.2 - Gerer les soldes

- Calculer le solde initial.
- Debiter et crediter selon les regles.
- Exposer une lecture claire par employe.

Critères d'acceptation:

- Le calcul du solde est deterministe et testable.
- Aucun ecran n'effectue les calculs metier a la place du domaine.

#### 3.3 - Gerer les demandes de conges

- Saisir une demande.
- Detecter chevauchements et conflits.
- Verifier le solde avant soumission.

Critères d'acceptation:

- Une demande invalide est rejetee par le domaine.
- Les conflits de calendrier sont visibles et tracables.

#### 3.4 - Implementer le workflow de validation

- Valider, rejeter, annuler.
- Supporter une validation multi-niveaux si necessaire.
- Journaliser toutes les transitions.

Critères d'acceptation:

- Les transitions d'etat sont explicites et controlees.
- Chaque transition produit un evenement metier utile.

#### 3.5 - Integrer avec EmployeManagement

- Consommer l'identite RH publiee de l'employe.
- Eviter la dependance directe vers les entites RH internes.

Critères d'acceptation:

- LeaveManagement ne manipule pas directement l'agregat Employe du contexte RH.

---

## Epic 4 - Purchase

### But

Mettre en place le module Achats correspondant au menu Commandes et Fournisseurs.

### Sous-domaines

- Fournisseur
- DemandeAchat
- CommandeAchat
- Reception
- FactureFournisseur
- ApprobationAchat

### Stories

#### 4.1 - Gerer les fournisseurs

- Creer, modifier, desactiver un fournisseur.
- Suivre informations legales, contact, statut et conditions.

Critères d'acceptation:

- Le fournisseur est un agregat autonome du contexte Purchase.
- Les regles de validite sont portees par le domaine.

#### 4.2 - Gerer les demandes d'achat

- Soumettre une demande d'achat.
- Definir demandeur, centre de cout, lignes de besoin, justification.
- Gerer cycle brouillon, soumis, valide, rejete.

Critères d'acceptation:

- Une demande d'achat suit un workflow metier explicite.
- Les transitions illegales sont bloquees.

#### 4.3 - Gerer les commandes d'achat

- Generer une commande a partir d'une demande validee.
- Suivre montant, fournisseur, lignes, statuts.
- Permettre l'annulation ou la cloture sous conditions.

Critères d'acceptation:

- La commande a une trace claire de son origine.
- Les statuts sont pilotés par le domaine et non par l'UI.

#### 4.4 - Gerer les receptions

- Reception partielle ou complete.
- Controle des quantites attendues vs recues.
- Historisation des receptions.

Critères d'acceptation:

- Les quantites recues ne peuvent pas depasser les quantites commandees sans regle explicite.

#### 4.5 - Gerer les factures fournisseurs

- Rattacher facture et commande.
- Controler ecarts de montant et de quantite.
- Publier les informations vers FinanceAccounting.

Critères d'acceptation:

- Les ecarts sont detectes et tracés.
- Les donnees transmises a Finance sont publiees via contrat ou evenement.

---

## Epic 5 - FinanceAccounting

### But

Gerer le budget, la tresorerie et les fondements comptables du systeme.

### Sous-domaines

- Budget
- CentreDeCout
- Tresorerie
- EcritureComptable
- PlanComptable
- Rapprochement

### Stories

#### 5.1 - Gerer les budgets

- Creer des budgets par periode.
- Associer des centres de cout.
- Suivre engage, consomme, disponible.

Critères d'acceptation:

- Le depassement budgetaire suit une regle metier explicite.
- Les chiffres viennent de projections fiables.

#### 5.2 - Integrer les engagements achat

- Consommer les evenements ou contrats du module Purchase.
- Mettre a jour les montants engages et valides.

Critères d'acceptation:

- Finance ne lit pas directement les tables internes de Purchase.

#### 5.3 - Gerer les ecritures comptables

- Generer les ecritures selon les evenements financiers.
- Conserver un journal immuable des ecritures.

Critères d'acceptation:

- Les ecritures comptables sont tracables et auditable.
- Le modele comptable est separe des ecrans.

#### 5.4 - Gerer la tresorerie et les rapprochements

- Suivre les mouvements de tresorerie.
- Rapprocher paiements et operations.

Critères d'acceptation:

- Les statuts de rapprochement sont explicites.
- Les exceptions metier sont tracees.

---

## Epic 6 - CRM

### But

Structurer la relation client et le cycle commercial.

### Sous-domaines

- Compte
- Contact
- Opportunite
- Devis
- Interaction
- PipelineCommercial

### Stories

#### 6.1 - Gerer les comptes et contacts

- Creer et qualifier comptes et contacts.
- Historiser les changements importants.

Critères d'acceptation:

- Les comptes et contacts sont clairement separes dans le modele metier.

#### 6.2 - Gerer les opportunites

- Creer une opportunite.
- Suivre stade, valeur, probabilite, responsable.

Critères d'acceptation:

- Le pipeline est pilote par des transitions metier explicites.

#### 6.3 - Gerer les devis et interactions

- Associer devis, rendez-vous, appels, notes et relances.

Critères d'acceptation:

- Les interactions sont historisees et exploitables en lecture.

---

## Epic 7 - ProjectBI

### But

Porter la gestion de projets, les KPI et les capacites de reporting.

### Sous-domaines

- Projet
- Tache
- Affectation
- KPI
- Rapport
- Export

### Stories

#### 7.1 - Gerer les projets

- Creer, planifier, suivre un projet.
- Definir responsable, dates, statut et budget de pilotage.

Critères d'acceptation:

- Les projets sont autonomes et n'introduisent pas de couplage fort avec RH.

#### 7.2 - Gerer les affectations et charges

- Affecter des ressources humaines a un projet via informations publiees.
- Suivre charge prevue et consommee.

Critères d'acceptation:

- ProjectBI consomme une representation publiee de l'employe, pas son agregat interne.

#### 7.3 - Produire des KPI et rapports

- Construire des projections de lecture dediees.
- Exporter CSV, Excel ou PDF si necessaire.

Critères d'acceptation:

- Les rapports ne reposent pas sur de la logique metier dans Twig.
- Les dashboards utilisent des vues de lecture specialisees.

---

## Epic 8 - ProductionLogistics

### But

Porter les fonctionnalites de production, stock, transport et livraison.

### Sous-domaines

- Article
- Stock
- Entrepot
- MouvementStock
- OrdreProduction
- Transport
- Livraison

### Stories

#### 8.1 - Gerer les articles et entrepots

- Creer les references articles.
- Gerer les entrepots et localisations.

Critères d'acceptation:

- Les informations de stock ont un owner metier clair.

#### 8.2 - Gerer les mouvements de stock

- Entrer, sortir, transferer, ajuster le stock.
- Journaliser chaque mouvement.

Critères d'acceptation:

- Aucun mouvement ne contourne le domaine.
- La tracabilite est complete.

#### 8.3 - Gerer production et livraisons

- Suivre les ordres de production.
- Organiser expeditions et livraisons.

Critères d'acceptation:

- Les dependances avec Purchase et ProjectBI passent par contrats explicites.

---

## Epic 9 - Administration

### But

Porter les fonctions transverses visibles dans le sidebar: utilisateurs, parametres, audit, API et integrations.

### Sous-domaines

- ParametreSysteme
- AuditTrail
- Integration
- ReferenceData
- FeatureFlag
- SupervisionFonctionnelle

### Stories

#### 9.1 - Gerer les parametres systeme

- Stocker les parametres fonctionnels.
- Versionner les changements critiques.

Critères d'acceptation:

- Les parametres ne sont pas disperses dans le code.

#### 9.2 - Mettre en place l'audit trail

- Journaliser les actions critiques par contexte.
- Conserver qui, quoi, quand, avant, apres si applicable.

Critères d'acceptation:

- Les modules sensibles sont auditables.
- L'audit est consultable sans exposer la persistence brute.

#### 9.3 - Gerer les integrations et API

- Definir les contrats d'entree et sortie.
- Versionner les API.
- Securiser les acces techniques.

Critères d'acceptation:

- Les integrations externes sont encapsulees en Infrastructure.
- Les contrats sont stables et versionnables.

#### 9.4 - Gerer les referentiels transverses

- Porter les listes de valeurs communes si elles sont reellement partagees.

Critères d'acceptation:

- Un referentiel ne sort vers Administration que s'il est effectivement transverse.

---

## Epic 10 - Architecture Applicative Et Technique

### But

Industrialiser les pratiques techniques pour garantir la qualite et la scalabilite.

### Stories

#### 10.1 - Standardiser CQRS et les contrats applicatifs

- Unifier Command, Query, Handler, DTO, Result.
- Definir les patterns d'erreur applicative.

Critères d'acceptation:

- Tous les nouveaux cas d'usage suivent le meme pattern.

#### 10.2 - Introduire les evenements metier et d'integration

- Definir la nomenclature des evenements.
- Introduire la publication d'evenements utiles entre contextes.

Critères d'acceptation:

- Les couplages transverses critiques peuvent etre reduits grace aux evenements.

#### 10.3 - Preparer l'asynchrone et l'idempotence

- Isoler les traitements longs.
- Rendre les handlers rejouables en securite.

Critères d'acceptation:

- Les traitements asynchrones n'introduisent pas de doublons metier.

#### 10.4 - Mettre en place les projections de lecture

- Optimiser dashboards, exports, listes volumineuses.

Critères d'acceptation:

- Les requetes de lecture intensives n'impactent pas les agregats d'ecriture.

---

## Epic 11 - Qualite, Test Et Gouvernance

### But

Assurer la fiabilite du metier et la maintenabilite du code.

### Stories

#### 11.1 - Definir la strategie de tests

- Tests unitaires de domaine.
- Tests applicatifs de handlers.
- Tests d'integration repositories.
- Tests web sur parcours critiques.
- Tests end-to-end sur les flux majeurs.

Critères d'acceptation:

- Chaque regle metier critique est couverte au bon niveau.

#### 11.2 - Mettre en place la verification d'architecture

- Regles statiques sur les dependances entre couches et modules.
- Controle des namespaces et conventions.

Critères d'acceptation:

- Une violation d'architecture est detectee automatiquement.

#### 11.3 - Mettre en place l'observabilite

- Logs metier.
- Correlation des commandes.
- Mesures de performance et d'erreur.

Critères d'acceptation:

- Les anomalies critiques sont tracables jusqu'au cas d'usage concerne.

---

## Priorisation Par Vague

### Vague A - Socle Et RH

1. Epic 0 - Fondations DDD Et Clean Architecture
2. Epic 1 - AccessIdentity
3. Epic 2 - EmployeManagement
4. Epic 3 - LeaveManagement
5. Epic 9 - Administration, version minimale
6. Epic 11 - Qualite et tests minimaux obligatoires

### Vague B - Achats Et Finance

1. Epic 4 - Purchase
2. Epic 5 - FinanceAccounting, noyau budgetaire et engagements
3. Epic 9 - Audit et parametres avances
4. Epic 10 - Evenements et projections de lecture

### Vague C - Commercial Et Pilotage

1. Epic 6 - CRM
2. Epic 7 - ProjectBI
3. Epic 11 - Renforcement couverture et observabilite

### Vague D - Execution Operationnelle

1. Epic 8 - ProductionLogistics
2. Epic 9 - Integrations et API avancees
3. Epic 10 - Asynchrone avance et performances

---

## Definition Of Done Par Story

Une story n'est terminee que si:

1. Le domaine porte les invariants metier.
2. Le cas d'usage passe par Command ou Query puis Handler.
3. La persistence est encapsulee en Infrastructure.
4. Le controleur web ne contient pas de logique metier.
5. Les permissions sont appliquees.
6. Les erreurs utilisateur sont gerees proprement.
7. Les tests utiles sont ajoutes.
8. Le menu correspondant du sidebar est coherent avec l'etat reel de livraison.

## Risques Principaux A Traiter Tot

1. Dette de nommage francais-anglais.
2. Fuite de logique metier dans les handlers ou controllers.
3. SharedKernel trop gros et trop generique.
4. Couplage direct entre modules via entites Doctrine ou acces base de donnees.
5. Dashboards construits directement sur des requetes melangeant trop de contextes sans contrat explicite.
6. Absence d'une matrice role-permission-use case avant les modules sensibles.

## Prochaine Etape Recommandee

1. Transformer ce backlog en roadmap sprint par sprint.
2. Creer le template standard d'un bounded context dans le projet.
3. Commencer par la remise a niveau du module RH existant avant d'ouvrir Purchase.
