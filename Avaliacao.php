<?php
require_once __DIR__ . '/exceptions/NotaInvalidaException.php';
require_once __DIR__ . '/exceptions/ComentarioInvalidoException.php';
// guilherme marques (2026106090041) que fez a classe Avaliacao
//para representar as avaliações feitas pelos usuários nas mídias, como filmes e séries.
class Avaliacao
{
    private ?int $id;
    private int $usuarioId;
    private int $midiaId;
    private int $estrelas;
    private ?string $comentario;
    private ?string $dataCriacao;

    public function __construct(
        int $usuarioId,
        int $midiaId,
        int $estrelas,
        ?string $comentario = null,
        ?int $id = null,
        ?string $dataCriacao = null
    ) {
        if ($usuarioId < 1 || $midiaId < 1) {
            throw new InvalidArgumentException('Usuário e mídia devem ter identificadores válidos.');
        }
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->midiaId = $midiaId;
        $this->setEstrelas($estrelas);
        $this->setComentario($comentario);
        $this->dataCriacao = $dataCriacao;
    }

    public function getId(): ?int { return $this->id; }
    public function getUsuarioId(): int { return $this->usuarioId; }
    public function getMidiaId(): int { return $this->midiaId; }
    public function getEstrelas(): int { return $this->estrelas; }
    public function getComentario(): ?string { return $this->comentario; }
    public function getDataCriacao(): ?string { return $this->dataCriacao; }

    public function setEstrelas(int $estrelas): void
    {
        if ($estrelas < 1 || $estrelas > 5) {
            throw new NotaInvalidaException('A nota deve ser de 1 a 5 estrelas.');
        }
        $this->estrelas = $estrelas;
    }

    public function setComentario(?string $comentario): void
    {
        $comentario = $comentario === null ? null : trim($comentario);
        if ($comentario === '') $comentario = null;
        $tamanho = $comentario === null ? 0 : (function_exists('mb_strlen') ? mb_strlen($comentario, 'UTF-8') : preg_match_all('/./us', $comentario));
        if ($tamanho === false || $tamanho > 500) {
            throw new ComentarioInvalidoException('O comentário deve ter no máximo 500 caracteres.');
        }
        $this->comentario = $comentario;
    }
}
