import { createUseStyles } from 'react-jss';
import { useContext } from 'react';
import UserContext from '../User/User';

const useStyles = createUseStyles({
  wrapper: {
    borderBottom: 'black solid 1px',
    padding: [15, 10],
    textAlign: 'right',
  }
});

export default function Navigation() {
    const user = useContext(UserContext);
    const classes = useStyles();
    return(
      <div className={classes.wrapper}>
        Bienvenue, {user.name}
      </div>
    )
  }
  