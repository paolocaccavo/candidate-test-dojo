## TempCRM

L'utente deve essere in grado di autenticarsi. (Nota, l'utente autenticato verrà considerato admin). >> metodo isAdmin() creato nel model User, che controlla che email_verifyed_at non sia null

* L'utente deve essere in grado di creare Clienti >> policy User isAdmin()

* L'utente deve essere in grado di creare Ordini ed associarli a Clienti. >> policy User isAdmin() e DRI aggiunto alla relazione esistente

* Quando un Ordine viene creato, viene automaticamente creato un Contratto associato al Cliente e all'Ordine. >> public static boot, all' Order::created viene creato un contratto associato all'ordine e al cliente

* Durante la creazione e modifica di un Ordine, quest'ultimo potrà essere associato ad uno o più Tags già presenti nel sistema >> tabella pivot

* Quando viene cancellato un Ordine, viene cancellato il Contratto >> public static boot, all' Order::deleted parte un foreach di cancellazione dei contratti

* Quando viene cancellato un Cliente, vengono cancellato tutti gli Ordini e tutti i Contratti appartenenti a quel Cliente >> public static boot, al Client::deleted parte un foreach di cancellazione degli ordini

* Tutte le cancellazioni devono essere recuperabili >> implementare le soft deletes su tutte le tabelle; il foreach di cancellazioni al posto di un delete on cascade rende possibile il recupero dei dati cancellati

P.S.: fixato il tasto delete non funzionante nell'index dei clienti