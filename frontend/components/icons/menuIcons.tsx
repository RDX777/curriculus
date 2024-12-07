"use client";
import { IconContext } from "react-icons";
import { LiaIdBadge } from "react-icons/lia";
import { TfiIdBadge } from "react-icons/tfi";
import {
  AiOutlineSetting,
  AiOutlineHome,
  AiOutlineLoading,
} from "react-icons/ai";
import { IoHomeOutline, IoSyncCircle, IoClose } from "react-icons/io5";
import { IoMdNotificationsOutline } from "react-icons/io";
import { BsMoonStars, BsSun, BsDatabaseDown } from "react-icons/bs";
import { TbError404, TbWorld } from "react-icons/tb";
import { CiSearch, CiMenuFries } from "react-icons/ci";
import {
  MdOutlineAddCircleOutline,
  MdOutlinePayment,
  MdDeleteOutline,
  MdOutlineGroups,
  MdAltRoute,
  MdDeleteForever,
  MdWork,
} from "react-icons/md";
import { BiCctv } from "react-icons/bi";
import { GiFastArrow } from "react-icons/gi";
import {
  FaSearch,
  FaRegSave,
  FaRegEdit,
  FaAccessibleIcon,
  FaUserTie,
  FaPlay,
  FaPause,
  FaWhatsapp,
  FaRegUser,
  FaLaughBeam,
  FaSadTear,
  FaRegSadCry,
} from "react-icons/fa";
import { VscLocation } from "react-icons/vsc";
import { GrPowerReset } from "react-icons/gr";

interface MenuIconsProps {
  name: string | null;
  className?: string;
  onClick?: () => void;
}

const iconMap: { [key: string]: React.ElementType } = {
  liaidbadge: LiaIdBadge,
  tfiidbadge: TfiIdBadge,
  aioutlinesetting: AiOutlineSetting,
  iohomeoutline: IoHomeOutline,
  iomdnotificationsoutline: IoMdNotificationsOutline,
  bsmoonstars: BsMoonStars,
  bssun: BsSun,
  fawhatsapp: FaWhatsapp,
  mdoutlinepayment: MdOutlinePayment,
  fareguser: FaRegUser,
  tberror404: TbError404,
  cisearch: CiSearch,
  mdoutlineaddcircleoutline: MdOutlineAddCircleOutline,
  mddeleteoutline: MdDeleteOutline,
  bsdatabasedown: BsDatabaseDown,
  iosynccircle: IoSyncCircle,
  bicctv: BiCctv,
  mdoutlinegroups: MdOutlineGroups,
  mdaltroute: MdAltRoute,
  cimenufries: CiMenuFries,
  gifastarrow: GiFastArrow,
  aioutlinehome: AiOutlineHome,
  aioutlineloading: AiOutlineLoading,
  faregsave: FaRegSave,
  faregedit: FaRegEdit,
  mddeleteforever: MdDeleteForever,
  fasearch: FaSearch,
  ioclose: IoClose,
  vsclocation: VscLocation,
  tbworld: TbWorld,
  faaccessibleicon: FaAccessibleIcon,
  mdwork: MdWork,
  grpowerreset: GrPowerReset,
  fausertie: FaUserTie,
  faplay: FaPlay,
  fapause: FaPause,
  falaughbeam: FaLaughBeam,
  fasadtear: FaSadTear,
  faregsadcry: FaRegSadCry,
};

const MenuIcons: React.FC<MenuIconsProps> = ({
  name,
  className,
  onClick,
  ...rest
}) => {
  let SelectedIcon;

  if (name) {
    SelectedIcon = iconMap[name.toLowerCase()];
  } else {
    SelectedIcon = iconMap["tberror404"];
  }

  if (!SelectedIcon) return null;

  return (
    <IconContext.Provider value={{ className: `${className || ""}`, ...rest }}>
      <SelectedIcon onClick={onClick} />
    </IconContext.Provider>
  );
};

export default MenuIcons;
