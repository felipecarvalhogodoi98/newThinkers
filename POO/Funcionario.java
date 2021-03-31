class Funcionario{
    private String nome;
    private String atividade;
  
    public Funcionario(String nome, String atividade){
      this.nome = nome;
      this.atividade = atividade;
    }
  
    String getNome(){
      return this.nome;
    }
    String getAtividade(){
      return this.atividade;
    }
  
  }