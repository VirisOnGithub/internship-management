<?php

require_once('src/modele/Specialite.php');

class Entreprise
{
	private int $numero;
	private string $raison_sociale;
	private string $nom_contact;
	private ?string $nom_responsable;
	private string $rue;
	private int $code_postal;
	private string $ville;
	private string $telephone;
	private string $fax;
	private string $email;
	private ?string $observations;
	private ?string $lien_site;
	private string $niveau_etude;
	private bool $en_activite;
	private array $specialtes;

	public function __construct(
		int $numero,
		string $raison_sociale,
		string $nom_contact,
		?string $nom_responsable,
		string $rue,
		int $code_postal,
		string $ville,
		string $telephone,
		string $fax,
		string $email,
		?string $observations,
		?string $lien_site,
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
		$this->specialtes = [];
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
	 * Get the value of nom_contact
	 */
	public function getNomContact(): string
	{
		return $this->nom_contact;
	}

	/**
	 * Get the value of nom_responsable
	 */
	public function getNomResponsable(): ?string
	{
		return $this->nom_responsable;
	}

	/**
	 * Get the value of rue
	 */
	public function getRue(): string
	{
		return $this->rue;
	}

	/**
	 * Get the value of code_postal
	 */
	public function getCodePostal(): int
	{
		return $this->code_postal;
	}

	/**
	 * Get the value of ville
	 */
	public function getVille(): string
	{
		return $this->ville;
	}

	/**
	 * Get the value of telephone
	 */
	public function getTelephone(): string
	{
		return $this->telephone;
	}

	/**
	 * Get the value of fax
	 */
	public function getFax(): string
	{
		return $this->fax;
	}

	/**
	 * Get the value of email
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * Get the value of observations
	 */
	public function getObservations(): ?string
	{
		return $this->observations;
	}

	/**
	 * Get the value of lien_site
	 */
	public function getLienSite(): ?string
	{
		return $this->lien_site;
	}

	/**
	 * Get the value of niveau
	 */
	public function getNiveauEtude(): string
	{
		return $this->niveau_etude;
	}

	/**
	 * Get the value of niveau
	 */
	public function isEnActivite(): bool
	{
		return $this->en_activite;
	}

	/**
	 * Get the value of specialites
	 */
	public function getSpecialites(): array
	{
		return $this->specialtes;
	}

	/**
	 * Ajoute une spécialite
	 */
	public function ajouterSpecialite(\Specialite $specialite): void
	{
		array_push($this->specialtes, $specialite);
	}
}
