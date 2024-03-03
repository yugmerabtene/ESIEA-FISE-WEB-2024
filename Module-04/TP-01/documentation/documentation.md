1. ***USECASE***  
   ![image](https://github.com/yugmerabtene/ESIEA-FISE-WEB-2024/assets/3670077/69bf9c89-3642-4949-a0cd-19ddcde26f4e)  


a. **Cas d'utilisation principal : Se Connecter, S'enregistrer et Accéder au Tableau de Bord**
   - **Acteurs :** Utilisateur
   - **Description :** L'utilisateur a la possibilité de se connecter après s'enregistrer avec succès et est redirigé vers son tableau de bord.
   - **Scénario Principal :**
     1. L'utilisateur choisit l'option de s'enregistrer.
     2. Le système affiche le formulaire d'enregistrement.
     3. L'utilisateur entre les informations d'enregistrement.
     4. Le système vérifie et enregistre les informations d'utilisateur.
     5. Si l'enregistrement réussit, l'utilisateur est redirigé vers la page de connexion.
     6. L'utilisateur entre ses identifiants.
     7. Le système vérifie les informations d'identification.
     8. Si la connexion réussit, l'utilisateur est redirigé vers son tableau de bord.

b. **Cas d'utilisation inclus : Visualiser le Tableau de Bord**
   - **Acteurs :** Utilisateur
   - **Description :** L'utilisateur visualise les informations présentées sur son tableau de bord.
   - **Scénario Principal :**
     1. L'utilisateur est connecté.
     2. Le système affiche les informations pertinentes sur le tableau de bord.

c. **Cas d'utilisation étendu : Modifier le Profil depuis le Tableau de Bord**
   - **Acteurs :** Utilisateur
   - **Description :** L'utilisateur a la possibilité de modifier son profil directement depuis le tableau de bord.
   - **Scénario Principal :**
     1. L'utilisateur est connecté.
     2. Le système affiche les informations du tableau de bord.
     3. L'utilisateur choisit l'option de modification du profil.
   - **Scénario d'Extension :**
     - Si l'utilisateur choisit de modifier son profil depuis le tableau de bord, il étend le cas d'utilisation principal "Se Connecter et Accéder au Tableau de Bord".

