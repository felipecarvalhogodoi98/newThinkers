class Ingrediente{
    private String nome;
    private String dataValidade;
  
    public Ingrediente(String nome, String dataValidade){
      this.nome = nome;
      this.dataValidade = dataValidade;
    }
  
    String getNome(){
      return this.nome;
    }
  
    String getDataValidade(){
      return this.dataValidade;
    }
  
  }