<?php

class Entreprise
{
	private int $numero;
	private string $raison_sociale;
	private string $nom_contact;
	private string $nom_responsable;
	private string $rue;
	private int $code_postal;
	private string $ville;
	private string $telephone;
	private string $fax;
	private string $email;
	private string $observations;
	private string $lien_site;
	private string $niveau_etude;
	private bool $en_activite;

	public function __construct(
		int $numero,
		string $raison_sociale,
		string $nom_contact,
		string $nom_responsable,
		string $rue,
		int $code_postal,
		string $ville,
		string $telephone,
		string $fax,
		string $email,
		string $observations,
		string $lien_site,
		string $niveau_etude,
		bool $en_activite
	) {
		$this->numero = $numero;
		$this->raison_sociale = $raison_sociale;
		$this->nom_contact = $nom_contact;
		$this->nom_responsable = $nom_responsable;
		$this->rue = $rue;
		$this->code_postal = $code_postal;
		$this->ville = $ville;
		$this->telephone = $telephone;
		$this->fax = $fax;
		$this->email = $email;
		$this->observations = $observations;
		$this->lien_site = $lien_site;
		$this->niveau_etude = $niveau_etude;
		$this->en_activite = $en_activite;
	}

	/**
	 * Get the value of numero
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * Get the value of raison_sociale
	 */
	public function getRaisonSociale(): string
	{
		return $this->raison_sociale;
	}

	/**
	 * Set the value of raison_sociale
	 */
	public function setRaisonSociale(string $raison_sociale): self
	{
		$this->raison_sociale = $raison_sociale;

		return $this;
	}

	/**
	 * Get the value of nom_contact
	 */
	public function getNomContact(): string
	{
		return $this->nom_contact;
	}

	/**
	 * Set the value of nom_contact
	 */
	public function setNomContact(string $nom_contact): self
	{
		$this->nom_contact = $nom_contact;

		return $this;
	}

	/**
	 * Get the value of nom_responsable
	 */
	public function getNomResponsable(): string
	{
		return $this->nom_responsable;
	}

	/**
	 * Set the value of nom_responsable
	 */
	public function setNomResponsable(string $nom_responsable): self
	{
		$this->nom_responsable = $nom_responsable;

		return $this;
	}

	/**
	 * Get the value of rue
	 */
	public function getRue(): string
	{
		return $this->rue;
	}

	/**
	 * Set the value of rue
	 */
	public function setRue(string $rue): self
	{
		$this->rue = $rue;

		return $this;
	}

	/**
	 * Get the value of code_postal
	 */
	public function getCodePostal(): int
	{
		return $this->code_postal;
	}

	/**
	 * Set the value of code_postal
	 */
	public function setCodePostal(int $code_postal): self
	{
		$this->code_postal = $code_postal;

		return $this;
	}

	/**
	 * Get the value of ville
	 */
	public function getVille(): string
	{
		return $this->ville;
	}

	/**
	 * Set the value of ville
	 */
	public function setVille(string $ville): self
	{
		$this->ville = $ville;

		return $this;
	}

	/**
	 * Get the value of telephone
	 */
	public function getTelephone(): string
	{
		return $this->telephone;
	}

	/**
	 * Set the value of telephone
	 */
	public function setTelephone(string $telephone): self
	{
		$this->telephone = $telephone;

		return $this;
	}

	/**
	 * Get the value of fax
	 */
	public function getFax(): string
	{
		return $this->fax;
	}

	/**
	 * Set the value of fax
	 */
	public function setFax(string $fax): self
	{
		$this->fax = $fax;

		return $this;
	}

	/**
	 * Get the value of email
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 */
	public function setEmail(string $email): self
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get the value of observations
	 */
	public function getObservations(): string
	{
		return $this->observations;
	}

	/**
	 * Set the value of observations
	 */
	public function setObservations(string $observations): self
	{
		$this->observations = $observations;

		return $this;
	}

	/**
	 * Get the value of lien_site
	 */
	public function getLienSite(): string
	{
		return $this->lien_site;
	}

	/**
	 * Set the value of lien_site
	 */
	public function setLienSite(string $lien_site): self
	{
		$this->lien_site = $lien_site;

		return $this;
	}

	/**
	 * Get the value of niveau
	 */
	public function getNiveauEtude(): string
	{
		return $this->niveau_etude;
	}

	/**
	 * Set the value of niveau
	 */
	public function setNiveauEtude(string $niveau_etude): self
	{
		$this->niveau_etude = $niveau_etude;

		return $this;
	}

	/**
	 * Get the value of niveau
	 */
	public function isEnActivite(): bool
	{
		return $this->en_activite;
	}

	/**
	 * Set the value of niveau
	 */
	public function setEnActivite(bool $en_activite): self
	{
		$this->en_activite = $en_activite;

		return $this;
	}
}