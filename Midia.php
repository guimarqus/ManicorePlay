
<?php
// guilherme marques (2026106090041) que fez a classe abstrata que servirá para as outras classes de midia,
// como filmes e series herdarem suas propriedades e métodos.
abstract class Midia
{
    protected ?int $id;
    protected string $titulo;
    protected string $genero;
    protected int $ano;
    protected string $sinopse;
    protected string $imagem;

    public function __construct(
        string $titulo,
        string $genero,
        int $ano,
        string $sinopse,
        string $imagem,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->ano = $ano;
        $this->sinopse = $sinopse;
        $this->imagem = $imagem;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function getSinopse(): string
    {
        return $this->sinopse;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function setGenero(string $genero): void
    {
        $this->genero = $genero;
    }

    public function setAno(int $ano): void
    {
        $this->ano = $ano;
    }

    public function setSinopse(string $sinopse): void
    {
        $this->sinopse = $sinopse;
    }

    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }

    abstract public function getDetalhes(): string;
}
