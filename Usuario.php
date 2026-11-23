<?php
/**
 Classe: Usuario
 Responsavel: Lademila Geovanna da Silva Abreu (2026106090005)
 Descricao: Representa um usuario do sistema de streaming
 */
class Usuario {
    
    public const TAMANHO_MINIMO_SENHA = 6;
    private static int $totalUsuariosCriados = 0;

    private int $id;
    private string $nome;
    private string $email;
    private string $senhaHash;

    public function __construct(string $nome, string $email, string $senhaHash, ?int $id = null) {
        self::$totalUsuariosCriados++;
        $this->id = $id ?? self::$totalUsuariosCriados;
        $this->nome = $nome;
        $this->email = $email;
        $this->senhaHash = $senhaHash;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public static function getTotalUsuariosCriados(): int {
        return self::$totalUsuariosCriados;
    }

    public function verificarSenha(string $senhaDigitada): bool {
        return password_verify($senhaDigitada, $this->senhaHash);
    }
}
