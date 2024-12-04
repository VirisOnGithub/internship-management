<?php

/**
 * @file Entreprise.php
 * Contient la classe Entreprise
 */

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

	/**
	 * Constructeur par défaut
	 * @param int $numero le numéro de l'entreprise (-1 si inconnu)
	 * @param string $raison_sociale le numéro social de l'entreprise
	 * @param string $nom_contact le nom du contact dans l'entreprise
	 * @param ?string $nom_responsable le nom du responsable
	 * @param string $rue la rue de l'entreprise
	 * @param int $code_postal le code postal de l'entreprise
	 * @param string $ville la ville de l'entreprise
	 * @param string $telephone le téléphone de l'entreprise
	 * @param string $fax le fax de l'entreprise
	 * @param string $email l'adresse email de l'entreprise
	 * @param ?string $observations les observations de l'entreprise
	 * @param ?string $lien_site le lien du site de l'entreprise
	 * @param string $niveau_etude le niveau d'étude nécessaire pour postuler dans l'entreprise
	 * @param bool $en_activite activité ou non de l'entreprise
	 */
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
	 * @return int le numéro de l'entreprise
	 */
	public function getNumero(): int
	{
		return $this->numero;
	}

	/**
	 * @return string la raison sociale de l'entreprise
	 */
	public function getRaisonSociale(): string
	{
		return $this->raison_sociale;
	}

	/**
	 * @return string le nom du contact
	 */
	public function getNomContact(): string
	{
		return $this->nom_contact;
	}

	/**
	 * @return string|null le nom du responsable
	 */
	public function getNomResponsable(): ?string
	{
		return $this->nom_responsable;
	}

	/**
	 * @return string la rue de l'entreprise
	 */
	public function getRue(): string
	{
		return $this->rue;
	}

	/**
	 * @return int le code postal de l'entreprise
	 */
	public function getCodePostal(): int
	{
		return $this->code_postal;
	}

	/**
	 * @return string le nom de la ville de l'entreprise
	 */
	public function getVille(): string
	{
		return $this->ville;
	}

	/**
	 * @return string le numéro de téléphone de l'entreprise
	 */
	public function getTelephone(): string
	{
		return $this->telephone;
	}

	/**
	 * @return string le fax de l'entreprise
	 */
	public function getFax(): string
	{
		return $this->fax;
	}


	/**
	 * @return string l'email de l'entreprise
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @return string|null les observations (éventuelles) sur l'entreprise
	 */
	public function getObservations(): ?string
	{
		return $this->observations;
	}

	/**
	 * @return string|null le lien (éventuel) du site
	 */
	public function getLienSite(): ?string
	{
		return $this->lien_site;
	}

	/**
	 * @return string le niveau d'étude nécessaire pour pouvoir postuler
	 */
	public function getNiveauEtude(): string
	{
		return $this->niveau_etude;
	}

	/**
	 * @return bool true si l'entreprise est en activité
	 */
	public function isEnActivite(): bool
	{
		return $this->en_activite;
	}

	/**
	 * @return Specialite [ ] les spécialités de l'entreprise
	 */
	public function getSpecialites(): array
	{
		return $this->specialtes;
	}


	/**
	 * Ajoute une spécialité à l'entreprise
	 * @remark Cette fonction ne modifie en aucun cas la base de données
	 * @param Specialite $specialite la spécialité à ajouter
	 * @return void
	 */
	public function ajouterSpecialite(\Specialite $specialite): void
	{
		array_push($this->specialtes, $specialite);
	}
}
