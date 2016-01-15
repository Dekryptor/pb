/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using Core.Database.Tables;
using Core.Model;
using PointBlank.Network;
using System.Collections.Generic;

namespace PointBlank.Network.ServerPacket
{
    internal class PROTOCOL_AUTH_FRIEND_INFO_ACK : SendPacket
    {

        public override void WriteImpl()
        {
            WriteH(0xA07);
            WriteC(1);//Кол-во друзей
            WriteC(33);//unk
            WriteS("TesterOZ", Player.MAX_NAME_SIZE);//имя друга
            WriteC(1);//френд нумер,хз что эт,возможно статус друга
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(49);//ранг друга
            WriteC(3);//unk
            WriteC(3);//unk
            WriteC(3);//unk
            //
            WriteH(1);
            WriteC((byte)10);
            WriteC((byte)33);
            WriteS("SLOkx", 33);
        }
    }
}
