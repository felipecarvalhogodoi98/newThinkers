import { useAuth } from "../providers/auth";
import { Button, PageHeader } from "antd";
import { useEffect } from "react";

function Profile(){
    const {user, setUser, getDataUser, setToken, setIsLoggedIn} = useAuth();

    const logout = () =>{
        setIsLoggedIn(false);
        setToken("");
    }

    useEffect(() => {
        getDataUser();
    })

    return (
        <>
        <PageHeader
            key={user.login}
            title={user.name}
            subTitle={user.location}
            extra={[
                <Button onClick={logout} danger>Logout</Button>
            ]}
        >
        </PageHeader>
        
        </>
    );
}

export default Profile;