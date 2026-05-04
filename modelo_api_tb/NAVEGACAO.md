# 🎯 Mapa de Navegação - Pokédex

## Páginas Conectadas

### 1. **Página Inicial (Home)**
- **URL:** `/`
- **Arquivo:** `resources/views/welcome.blade.php`
- **Função:** Página de boas-vindas com links para as principais funcionalidades
- **Navegação:**
  - 🔍 Link para **Buscar Pokémons** → `/pokemon` (pokemon.index)
  - ➕ Link para **Cadastrar Novo Pokémon** → `/pokemon/novo` (pokemon.create)

---

### 2. **Busca e Visualização de Pokémons**
- **URL:** `/pokemon`
- **Arquivo:** `resources/views/pokemon.blade.php`
- **Função:** Buscar pokémons pela PokeAPI e exibir detalhes
- **Navegação:**
  - 🏠 Botão **Início** → `/` (home)
  - 🔄 Botão **Buscar Outro** → Limpa formulário e permite nova busca
  - ➕ Botão **Novo Pokémon** → `/pokemon/novo` (pokemon.create)

---

### 3. **Cadastrar Novo Pokémon**
- **URL:** `/pokemon/novo`
- **Arquivo:** `resources/views/cadastro.blade.php`
- **Função:** Formulário para registrar novo pokémon no banco de dados
- **Navegação:**
  - 🏠 Botão **Início** → `/` (home)
  - 🔍 Botão **Buscar** → `/pokemon` (pokemon.index)
  - 📝 Botão **Cadastrar Pokémon** → Submete o formulário (POST /pokemon/novo)

---

## 📊 Fluxo de Navegação

```
            ┌─────────────────┐
            │ Página Inicial  │
            │   (/)           │
            └────────┬────────┘
                     │
        ┌────────────┼────────────┐
        │                         │
        ▼                         ▼
   ┌──────────────┐         ┌─────────────────┐
   │ Buscar       │◄───────►│ Cadastrar Novo  │
   │ Pokémons     │         │ Pokémon         │
   │ (/pokemon)   │         │ (/pokemon/novo) │
   └──────────────┘         └─────────────────┘
        │                         │
        └────────────┬────────────┘
                     │
                     ▼
            ┌─────────────────┐
            │ Página Inicial  │
            │   (/)           │
            └─────────────────┘
```

---

## 🔗 Rotas no Laravel

```php
// routes/web.php

Route::get('/', [ApiPokemonController::class, 'index'])
    ->name('pokemon.index');

Route::get('/pokemon', [ApiPokemonController::class, 'index'])
    ->name('pokemon.show');

Route::get('/pokemon/novo', [PokemonController::class, 'create'])
    ->name('pokemon.create');

Route::post('/pokemon/novo', [PokemonController::class, 'store'])
    ->name('pokemon.store');
```

---

## 🎨 Alterações Realizadas

### ✅ `welcome.blade.php` (Página Inicial)
- Adicionados links para **Buscar Pokémons** e **Cadastrar Novo Pokémon**
- Customizado para tema Pokédex
- Título: "Bem-vindo à Pokédex!"

### ✅ `pokemon.blade.php` (Busca)
- Adicionados 3 botões de navegação no cabeçalho:
  - 🏠 **Início** (home)
  - 📝 **Novo Pokémon** (cadastro)
- Melhorados botões na seção de ações
- Design consistente com Tailwind CSS

### ✅ `cadastro.blade.php` (Cadastro)
- Adicionados links de navegação no cabeçalho:
  - 🏠 **Início** (home)
  - 🔍 **Buscar** (busca)
- Adicionado botão extra de **Início** nos botões de ação
- Cores e estilos melhorados

---

## 💡 Como Usar a Pokédex

1. **Acesse a página inicial:** `http://localhost/`
2. **Escolha uma ação:**
   - Clique em **"🔍 Buscar Pokémon"** para procurar pokémons
   - Clique em **"➕ Novo Pokémon"** para cadastrar um novo
3. **Na página de busca:**
   - Digite o nome do pokémon e clique em **Buscar**
   - Veja os detalhes, stats e habilidades
   - Use os botões para navegar
4. **Na página de cadastro:**
   - Preencha o formulário com dados do pokémon
   - Selecione tipos, stats e habilidades
   - Clique em **Cadastrar Pokémon**

---

## 📝 Notas Importantes

- Todas as páginas têm navegação consistente
- Design responsivo (mobile + desktop)
- Cores seguem o tema Pokemon (vermelho, dourado, azul)
- Usa PokeAPI para buscar dados de pokémons reais
- Banco de dados local para pokémons customizados

---

**Desenvolvido com ❤️ - Gotta Catch 'Em All! 🎮**
