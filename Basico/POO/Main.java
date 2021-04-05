class Main {
    public static void main(String[] args) {
     
     //Simulação de um código procedural
     System.out.println("Iniciando os trabalhos do resturante");
     //nome cozinha, horaAbertura, horaFechamento, Ingrediente, funcionario
     
  
     Cozinha mineira = new Cozinha("mineira", 14, 20, 5, 4);
     Ingrediente i1 = new Ingrediente("Farinha", "10/12/2021");
     Ingrediente i2 = new Ingrediente("Arroz","10/12/2021");
     Ingrediente i3 = new Ingrediente("Carne de porco","10/12/2021");
     Ingrediente i4 = new Ingrediente("Linguica","10/12/2021");
     Ingrediente i5 = new Ingrediente("Feijao","10/12/2021");
     Funcionario f1 = new Funcionario("Joao", "Atentendente");
     Funcionario f2 = new Funcionario("Felipe", "Atentendente");
     Funcionario f3 = new Funcionario("Fernando", "Cozinehiro");
     Funcionario f4 = new Funcionario("Natanael", "Gerente");
     mineira.getIngredientes();
     mineira.getFuncionarios();
  
     mineira.addIngrediente(i1);
     mineira.addIngrediente(i2);
     mineira.addIngrediente(i3);
     mineira.addIngrediente(i4);
     mineira.addIngrediente(i5);
     mineira.addFuncionario(f1);
     mineira.addFuncionario(f2);
     mineira.addFuncionario(f3);
     mineira.addFuncionario(f4);
     
     mineira.getIngredientes();
     mineira.getFuncionarios();
    }
  }