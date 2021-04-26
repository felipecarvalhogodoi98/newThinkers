import { useAuth } from "../providers/auth";
import { Button, PageHeader } from "antd";
import { useEffect } from "react";

function Profile(){
    const {user, setUser, getDataUser, setToken, setIsLoggedIn} = useAuth();
    const logout = () =>{
        setIsLoggedIn(false);
        setUser({});
        setToken("");
    }

    useEffect(() => {
        getDataUser();
        // eslint-disable-next-line react-hooks/exhaustive-deps
    },[])

    return (
        <>
        <PageHeader
            title={<img className="img" alt="example" src={user.avatar_url} />}
            subTitle={user.name}
            extra={[
                <Button onClick={logout} danger>Logout</Button>
            ]}
        >
        </PageHeader>
 
        
        </>
    );
}

export default Profile;