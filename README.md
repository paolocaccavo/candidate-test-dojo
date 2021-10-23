## TempCRM

L'utente deve essere in grado di autenticarsi. (Nota, l'utente autenticato verrà considerato admin). >> metodo isVerifyed() creato nel model User, che controlla che email_verifyed_at non sia null; aggiunta di ['verify' => true] nelle Auth::routes(), aggiunta del middleware 'verified' nei controller diversi da HomeController

* L'utente deve essere in grado di creare Clienti

* L'utente deve essere in grado di creare Ordini ed associarli a Clienti. >> Contoller e Viste admin

* Quando un Ordine viene creato, viene automaticamente creato un Contratto associato al Cliente e all'Ordine. >> All'evento Order::created viene creato un contratto associato all'ordine e al cliente

* Durante la creazione e modifica di un Ordine, quest'ultimo potrà essere associato ad uno o più Tags già presenti nel sistema >> tabella pivot order_tag

* Quando viene cancellato un Ordine, viene cancellato il Contratto >> public static boot, all' Order::deleted parte un foreach di cancellazione dei contratti

* Quando viene cancellato un Cliente, vengono cancellati tutti gli Ordini e tutti i Contratti appartenenti a quel Cliente >> public static boot, al Client::deleted parte un foreach di cancellazione degli ordini

* Tutte le cancellazioni devono essere recuperabili >> implementare le soft deletes su tutte le tabelle; il foreach di cancellazioni al posto di un delete on cascade rende possibile il recupero dei dati cancellati

P.S.: fixato il tasto delete non funzionante nell'index dei clienti; fixato il model errato nella relazione customer di App\Models\Order; fixato il protected $fillable mancante in Order; fixato il withMessage non funzionante nel metodo update del Customer