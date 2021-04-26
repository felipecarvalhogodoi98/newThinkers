import Profile from "../components/Profile";
import { useAuth } from "../providers/auth";
import { useFollowing} from "../providers/following";
import { useState, useEffect } from "react";
import axios from "axios";
import { Tabs, Form, Row, Col, Input, Button, List, Card } from "antd";

const {TabPane } = Tabs;

function Home(){
    	const [form] = Form.useForm()
      const { token, follow, unfollow } = useAuth();
      const [users, setUsers] = useState([]);
      const { setFollowing, following, getFollowingUser } = useFollowing();
      const [loading, setLoading] = useState(false);
      const [totalCount, setTotalCount] = useState(0);
      const [queryP, setQueryP] = useState("");

      async function getUsers(query, per_page = 24, page = 1){
        setLoading(true)
        const res = await axios.get(`https://api.github.com/search/users?q=${query}&per_page=${per_page}&page=${page}`,{
        headers: {
          Authorization: `token ${token}`,
          },
        });
        setUsers(res.data.items);
        setTotalCount(res.data.total_count);
        setLoading(false);
    }

    function pageChangeUsers(page, pageSize){
      getUsers(queryP, pageSize, page)
    }

    function pageChangeFollowing(page, pageSize){
      console.log("mudou")
    }

    function onFinish(values){
      setQueryP(values.query);
      getUsers(values.query);
    }

    function seguir(item){
      follow(item.login);
      setFollowing([...following, item]);
    }

    function deixarDeSeguir(item){
      unfollow(item.login);
      const newList = Array.from(following);
      const index = newList.findIndex(it => it.login === item.login);
      newList.splice(index, 1);
      setFollowing(newList);
    }

    const card = (item) => {
      return (
        <Card
          actions={[
            following.find((it) => it.id === item.id) ?
            <Button onClick={() => deixarDeSeguir(item)} >Deixar de seguir</Button> :
            <Button onClick={() => seguir(item)} >Seguir</Button>
          ]}
          cover={<img alt="avatar" src={item.avatar_url} />}
          title={item.login}
        >
          <a href={item.url}>
            {item.login}
          </a>
        </Card>
      );
    }

    useEffect(() => {
      getFollowingUser(token);
      // eslint-disable-next-line react-hooks/exhaustive-deps
    },[])
    
    return (
        <>
          <Profile/>
          <div style={{margin: 20}}>
            <Tabs defaultActiveKey="1" >
                <TabPane tab="Buscar" key="1">
                  <Form onFinish={onFinish} form={form}>
                    <Row gutter={16}>
                      <Col sm={20}>
                        <Form.Item name="query" rules={[{ required: true, message: "Campo Obrigatório" }]}>
                          <Input />
                        </Form.Item>
                      </Col>
                      <Col sm={4}>
                        <Button loading={loading} htmlType="submit">
                          Buscar
                        </Button>
                      </Col>
                    </Row>
                  </Form>
                  <List
                    loading={loading}
                    grid={{
                      gutter: 16,
                      xs: 1,
                      sm: 2,
                      md: 4,
                      lg: 4,
                      xl: 6,
                      xxl: 3,
                    }}
                    dataSource={users}
                    pagination={{
                      total: totalCount < 1000 ? totalCount : 1000,
                      pageSize: 24,
                      onChange: pageChangeUsers,
                    }}
                    renderItem={(item) => <List.Item>{card(item)}</List.Item>}
                  />
                </TabPane>
                <TabPane tab={`Seguindo (${following.length})`} key="2">
                <br/>
                <List
                    loading={loading}
                    grid={{
                      gutter: 16,
                      xs: 1,
                      sm: 2,
                      md: 4,
                      lg: 4,
                      xl: 6,
                      xxl: 3,
                    }}
                    dataSource={following}
                    pagination={{
                      total: following.length,
                      pageSize: 4,
                      onChange: pageChangeFollowing,
                    }}
                    renderItem={(item) => <List.Item>{card(item)}</List.Item>}
                  />
                </TabPane>
              </Tabs>
            </div>
        </> 
    );
}

export default Home;