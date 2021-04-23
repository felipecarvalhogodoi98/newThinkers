import Profile from "../components/Profile";
import { useAuth } from "../providers/auth";

function Home(){
    const { user } = useAuth();

    
    return (
        <>
          <Profile/>
        </> 
    );
}

export default Home;