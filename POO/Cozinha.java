class Cozinha{

  private int numeroPratos;
  private String tipo;
  private int numeroCozinheiros;
  private int tempoPreparo;
  private int horaAbertura;
  private int horaFechamento;
  private Ingrediente ingredientes[];
  private int maxQuantIngredientes;
  private int quantIngredientes;
  private Funcionario funcionarios[];
  private int quantFuncionarios;
  private int maxQuantFuncionarios;

  public Cozinha(String tipo, int horaAbertura, int horaFechamento, int quantIngredientes, int quantFuncionarios){
    this.tipo = tipo;
    this.horaAbertura = horaAbertura;
    this.horaFechamento = horaFechamento;

    this.maxQuantIngredientes = quantIngredientes;
    this.ingredientes = new Ingrediente[quantIngredientes];
    this.quantIngredientes = 0;

    this.maxQuantFuncionarios = quantFuncionarios;
    this.funcionarios = new Funcionario[quantFuncionarios];
    this.quantFuncionarios = 0;
  }

  int getNumeroPratos(){
    return this.numeroPratos;
  }

  String getTipo(){
    return this.tipo;
  }

  int getNumeroCozinheiros(){
    return this.numeroCozinheiros;
  }

  int getTempoPreparo(){
    return this.tempoPreparo;
  }

  int getHoraAberura(){
    return this.horaAbertura;
  }

  int getHoraFechamento(){
    return this.horaFechamento;
  }

  void setNumeroPratos(int n){
    numeroPratos = n;
  }

  void setNumeroCozinheiros(int n){
    numeroCozinheiros = n;
  }

  void setTempoPreparo(int n){
    tempoPreparo = n;
  }

  void prepararPratos(){
    System.out.println("Preparando prato");
  }

  void lavarLouca(){
    System.out.println("Lavando a louça");
  }

  void addIngrediente(Ingrediente i){
    if(this.quantIngredientes == this.maxQuantIngredientes){
      System.out.println("Na cozinha ja tem o maximo de ingredientes!");
    }else{
      this.ingredientes[this.quantIngredientes] = i;
      this.quantIngredientes += 1;
    }
  }

  void getIngredientes(){
    if(this.quantIngredientes == 0){
      System.out.println("Nao existe ingredientes");
    }else{
      for(int i=0; i< this.quantIngredientes; i++){
        System.out.println(this.ingredientes[i].getNome());
      }
    }
  }

  void addFuncionario(Funcionario f){
    if(this.quantFuncionarios == this.maxQuantFuncionarios){
      System.out.println("Na cozinha ja tem o maximo de funcionarios!");
    }else{
      this.funcionarios[this.quantFuncionarios] = f;
      this.quantFuncionarios += 1;
    }
  }

  void getFuncionarios(){
    if(this.quantFuncionarios == 0){
      System.out.println("Nao existe funcionarios");
    }else{
      for(int i=0; i< this.quantFuncionarios; i++){
        System.out.println(this.funcionarios[i].getNome());
      }
    }
  }

}